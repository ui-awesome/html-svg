<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPForge\Support\LineEndingNormalizer;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Svg\LinearGradient;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SpreadMethod, SvgAttribute};

/**
 * Unit tests for {@see LinearGradient} element rendering, content, and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for
 * {@see LinearGradient::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<linearGradient>` with inline content.
 * - Renders `<linearGradient>` with representative gradient and coordinate attributes.
 * - Supports nested rendering via `begin()` and `end()`.
 *
 * {@see LinearGradient} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('linearGradient')]
final class LinearGradientTest extends TestCase
{
    public function testRenderWithAddAriaAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient aria-pressed="true">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient aria-pressed="true">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->addAriaAttribute(\UIAwesome\Html\Attribute\Values\Aria::PRESSED, true)->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient data-value="value">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient data-value="value">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->addDataAttribute(\UIAwesome\Html\Attribute\Values\Data::VALUE, 'value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()
                                ->ariaAttributes(
                                    [
                                        'controls' => static fn(): string => 'modal-1',
                                        'hidden' => false,
                                        'label' => 'Close',
                                    ],
                                )
                                ->content('value')
                                ->render(),
            ),
            "Failed asserting that element renders correctly with 'ariaAttributes()' method.",
        );
    }

    public function testRenderWithAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient class="value">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->attributes(['class' => 'value'])->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient>
            Content
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->begin() . 'Content' . LinearGradient::end(),
            ),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient class="gradient-style">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->class('gradient-style')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient>
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->render(),
            ),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient data-value="test-value">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient class="default-class">
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag(['class' => 'default-class'])->render(),
            ),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient class="default-class">
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->addDefaultProvider(DefaultProvider::class)->render(),
            ),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(LinearGradient::class, ['class' => 'default-class']);

        self::assertEquals(
            <<<HTML
            <linearGradient class="default-class">
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->render(),
            ),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(LinearGradient::class, []);
    }

    public function testRenderWithGradientTransform(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient gradientTransform="rotate(90)">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->gradientTransform('rotate(90)')->render(),
            ),
            "Failed asserting that element renders correctly with 'gradientTransform' attribute.",
        );
    }

    public function testRenderWithGradientUnits(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient gradientUnits="userSpaceOnUse">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->gradientUnits('userSpaceOnUse')->render(),
            ),
            "Failed asserting that element renders correctly with 'gradientUnits' attribute.",
        );
    }

    public function testRenderWithGradientUnitsUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient gradientUnits="objectBoundingBox">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->gradientUnits(CoordinateUnits::OBJECT_BOUNDING_BOX)->render(),
            ),
            "Failed asserting that element renders correctly with 'gradientUnits' attribute using enum.",
        );
    }

    public function testRenderWithId(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient id="gradient1">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->id('gradient1')->render(),
            ),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLang(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient lang="es">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->lang('es')->render(),
            ),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient role="banner">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->role('banner')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithSpreadMethod(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient spreadMethod="reflect">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->spreadMethod('reflect')->render(),
            ),
            "Failed asserting that element renders correctly with 'spreadMethod' attribute.",
        );
    }

    public function testRenderWithSpreadMethodUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient spreadMethod="repeat">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->spreadMethod(SpreadMethod::REPEAT)->render(),
            ),
            "Failed asserting that element renders correctly with 'spreadMethod' attribute using enum.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient style='test-value'>
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->style('test-value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient tabindex="3">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->tabIndex(3)->render(),
            ),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient>
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                (string) LinearGradient::tag()->content('value'),
            ),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(LinearGradient::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::assertEquals(
            <<<HTML
            <linearGradient class="from-global" id="id-user">
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag(['id' => 'id-user'])->render(),
            ),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(LinearGradient::class, []);
    }

    public function testRenderWithX1(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient x1="0">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->x1('0')->render(),
            ),
            "Failed asserting that element renders correctly with 'x1' attribute.",
        );
    }

    public function testRenderWithX2(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient x2="100%">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->x2('100%')->render(),
            ),
            "Failed asserting that element renders correctly with 'x2' attribute.",
        );
    }

    public function testRenderWithY1(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient y1="0">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->y1('0')->render(),
            ),
            "Failed asserting that element renders correctly with 'y1' attribute.",
        );
    }

    public function testRenderWithY2(): void
    {
        self::assertEquals(
            <<<HTML
            <linearGradient y2="100%">
            value
            </linearGradient>
            HTML,
            LineEndingNormalizer::normalize(
                LinearGradient::tag()->content('value')->y2('100%')->render(),
            ),
            "Failed asserting that element renders correctly with 'y2' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $gradient = LinearGradient::tag();

        self::assertNotSame(
            $gradient,
            $gradient->gradientUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->gradientTransform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->spreadMethod(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->x1(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->y1(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->x2(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->y2(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingGradientUnitsValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::GRADIENT_UNITS->value,
                implode("', '", Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        LinearGradient::tag()->gradientUnits('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingSpreadMethodValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::SPREAD_METHOD->value,
                implode("', '", Enum::normalizeArray(SpreadMethod::cases())),
            ),
        );

        LinearGradient::tag()->spreadMethod('invalid-value');
    }
}
