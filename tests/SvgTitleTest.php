<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use DOMDocument;
use DOMElement;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use Stringable;
use UIAwesome\Html\Core\Config\{Call, ComponentContext, Config, Cookbook, Recipe};
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Svg;
use UIAwesome\Html\Svg\Tests\Provider\SvgTitleProvider;
use UIAwesome\Html\Svg\Tests\Support\Stub\Theme;
use UnitEnum;

/**
 * Unit tests for {@see Svg} title text and XML structure.
 *
 * {@see SvgTitleProvider} for test case data providers.
 */
#[Group('svg')]
final class SvgTitleTest extends TestCase
{
    #[DataProviderExternal(SvgTitleProvider::class, 'text')]
    public function testElementsKeepSvgNamespace(string|null $payload, string $source, string $entry): void
    {
        $svg = self::parse(self::renderTitle($payload, $source, $entry));

        self::assertSame(
            'http://www.w3.org/2000/svg',
            $svg->namespaceURI,
            'Root namespace must remain SVG.',
        );

        foreach ($svg->getElementsByTagName('*') as $element) {
            self::assertSame(
                'http://www.w3.org/2000/svg',
                $element->namespaceURI,
                'Child namespace must remain SVG.',
            );
        }
    }

    #[DataProviderExternal(SvgTitleProvider::class, 'invalidTitles')]
    public function testThrowInvalidArgumentExceptionForNonStringTitle(mixed $title, string $source): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::TITLE_ATTRIBUTE_MUST_BE_STRING_OR_NULL->getMessage(),
        );

        self::renderSource(Svg::tag()->attributes(['title' => $title]), $source);
    }

    #[DataProviderExternal(SvgTitleProvider::class, 'enums')]
    public function testTitleAcceptsStringAndPureEnums(UnitEnum $title, string $source, string $expected): void
    {
        $svg = self::parse(self::renderSource(Svg::tag()->title($title), $source));

        self::assertSame(
            self::expectedTitle($expected, $source),
            $svg->getElementsByTagName('title')->item(0)?->textContent,
            'Enum text must be preserved.',
        );
    }

    #[DataProviderExternal(SvgTitleProvider::class, 'text')]
    public function testTitleCannotCreateAttributes(string|null $payload, string $source, string $entry): void
    {
        $svg = self::parse(self::renderTitle($payload, $source, $entry));

        $allowedRootAttributes = ['xmlns', 'viewBox', 'version'];

        foreach ($svg->attributes as $attribute) {
            self::assertContains(
                $attribute->nodeName,
                $allowedRootAttributes,
                'Unexpected root attribute.',
            );
        }

        foreach ($svg->getElementsByTagName('*') as $element) {
            $allowedAttributes = $element->localName === 'path' ? ['d'] : [];

            foreach ($element->attributes as $attribute) {
                self::assertContains(
                    $attribute->nodeName,
                    $allowedAttributes,
                    'Unexpected child attribute.',
                );
            }
        }
    }

    #[DataProviderExternal(SvgTitleProvider::class, 'text')]
    public function testTitleCannotCreateElements(string|null $payload, string $source, string $entry): void
    {
        $svg = self::parse(self::renderTitle($payload, $source, $entry));

        $expected = [];

        if ($payload !== null && $payload !== '') {
            $expected[] = 'title';
        }

        if ($source === 'inline-path' || $source === 'php.svg') {
            $expected[] = 'path';
        }

        $title = $svg->getElementsByTagName('title')->item(0);

        if ($title !== null) {
            self::assertSame(
                $title,
                $svg->firstElementChild,
                'Title must be the first child of the SVG root.',
            );
            self::assertSame(
                0,
                $title->childElementCount,
                'Title must contain only text.',
            );
        }

        $actual = [];

        foreach ($svg->getElementsByTagName('*') as $element) {
            $actual[] = $element->localName;
        }

        self::assertSame(
            $expected,
            $actual,
            'Only the title and original path may exist, in that order.',
        );
    }

    #[DataProviderExternal(SvgTitleProvider::class, 'text')]
    public function testTitleRemainsText(string|null $payload, string $source, string $entry): void
    {
        $svg = self::parse(self::renderTitle($payload, $source, $entry));

        $titles = $svg->getElementsByTagName('title');

        $expected = self::expectedTitle($payload, $source);

        self::assertSame(
            $expected === null ? 0 : 1,
            $titles->length,
            'Title presence must match the input.',
        );

        if ($expected !== null) {
            self::assertSame(
                $expected,
                $titles->item(0)?->textContent,
                'Text must survive exactly once.',
            );
        }
    }

    #[DataProviderExternal(SvgTitleProvider::class, 'sources')]
    public function testTitleStringableIsCapturedOnce(string $source): void
    {
        $title = new class implements Stringable {
            public int $calls = 0;

            public function __toString(): string
            {
                $this->calls++;

                return $this->calls === 1 ? 'A & B' : '<b>unexpected second conversion</b>';
            }
        };

        $svg = self::parse(self::renderSource(Svg::tag()->attributes(['title' => $title]), $source));

        self::assertSame(
            1,
            $title->calls,
            'Title must be converted once per render.',
        );
        self::assertSame(
            self::expectedTitle('A & B', $source),
            $svg->getElementsByTagName('title')->item(0)?->textContent,
            'The first conversion must supply the title text.',
        );
    }

    private static function expectedTitle(string|null $payload, string $source): string|null
    {
        if ($payload === null || $payload === '') {
            return null;
        }

        return str_starts_with($source, 'inline-') ? "\n$payload\n" : $payload;
    }

    private static function parse(string $rendered): DOMElement
    {
        if ($rendered === '') {
            self::fail('An SVG fragment must be produced.');
        }

        $document = new DOMDocument();

        self::assertTrue(
            $document->loadXML($rendered),
            'Output must remain valid XML.',
        );
        self::assertNotNull(
            $document->documentElement,
            'An SVG root must exist.',
        );
        self::assertSame(
            'svg', $document->documentElement->localName,
            'Root element must remain SVG.',
        );

        return $document->documentElement;
    }

    private static function renderSource(Svg $svg, string $source): string
    {
        return match ($source) {
            'inline-empty' => $svg->xmlns('http://www.w3.org/2000/svg')->html(' ')->render(),
            'inline-path' => $svg->xmlns('http://www.w3.org/2000/svg')->html('<path d="M0 0"/>')->render(),
            default => $svg->filePath(__DIR__ . '/Support/Stub/' . $source)->render(),
        };
    }

    private static function renderTitle(string|null $payload, string $source, string $entry): string
    {
        $svg = match ($entry) {
            'title' => Svg::tag()->title($payload),
            'addAttribute' => Svg::tag()->addAttribute('title', $payload),
            'attributes' => Svg::tag()->attributes(['title' => $payload]),
            'replaceAttributes' => Svg::tag()->replaceAttributes(['title' => $payload]),
            'defaults' => Svg::tag(['title' => $payload]),
            'config' => Svg::tag()->config(
                new Config(new Theme('svg', new Recipe('svg.svg', new Cookbook(new Call('title', $payload))))),
                new ComponentContext('svg'),
            ),
            default => throw new InvalidArgumentException("Unknown title entry: $entry."),
        };

        return self::renderSource($svg, $source);
    }
}
