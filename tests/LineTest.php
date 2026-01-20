<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPForge\Support\LineEndingNormalizer;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Values\{Aria, Data, Language, Role};
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Svg\Line;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Values\{FillRule, StrokeLineCap, StrokeLineJoin, SvgAttribute};

/**
 * Unit tests for {@see Line} element rendering and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for {@see Line::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<line>` with representative global HTML attributes.
 * - Renders `<line>` with representative SVG attributes.
 *
 * {@see Line} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class LineTest extends TestCase
{
    public function testRenderWithAccesskey(): void
    {
        self::assertEquals(
            <<<HTML
            <line accesskey="k">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->accesskey('k')->render(),
            ),
            "Failed asserting that element renders correctly with 'accesskey' attribute.",
        );
    }

    public function testRenderWithAddAriaAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <line aria-pressed="true">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->addAriaAttribute('pressed', true)->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <line aria-pressed="true">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->addAriaAttribute(Aria::PRESSED, true)->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <line data-value="value">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->addDataAttribute('value', 'value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <line data-value="value">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->addDataAttribute(Data::VALUE, 'value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <line aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()
                                ->ariaAttributes(
                                    [
                                        'controls' => static fn(): string => 'modal-1',
                                        'hidden' => false,
                                        'label' => 'Close',
                                    ],
                                )
                                ->render(),
            ),
            "Failed asserting that element renders correctly with 'ariaAttributes()' method.",
        );
    }

    public function testRenderWithAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <line class="value">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->attributes(['class' => 'value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::assertEquals(
            <<<HTML
            <line class="value">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->class('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <line data-value="test-value">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->dataAttributes(['value' => 'test-value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::assertEquals(
            <<<HTML
            <line class="default-class">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag(['class' => 'default-class'])->render(),
            ),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::assertEquals(
            <<<HTML
            <line class="default-class" title="default-title">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->addDefaultProvider(DefaultProvider::class)->render(),
            ),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithDir(): void
    {
        self::assertEquals(
            <<<HTML
            <line dir="rtl">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->dir('rtl')->render(),
            ),
            "Failed asserting that element renders correctly with 'dir' attribute.",
        );
    }

    public function testRenderWithFill(): void
    {
        self::assertEquals(
            <<<HTML
            <line fill="#ff0000">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->fill('#ff0000')->render(),
            ),
            "Failed asserting that element renders correctly with 'fill' attribute.",
        );
    }

    public function testRenderWithFillOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <line fill-opacity="0.7">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->fillOpacity('0.7')->render(),
            ),
            "Failed asserting that element renders correctly with 'fill-opacity' attribute.",
        );
    }

    public function testRenderWithFillRule(): void
    {
        self::assertEquals(
            <<<HTML
            <line fill-rule="evenodd">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->fillRule('evenodd')->render(),
            ),
            "Failed asserting that element renders correctly with 'fill-rule' attribute.",
        );
    }

    public function testRenderWithFillRuleUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <line fill-rule="nonzero">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->fillRule(FillRule::NONZERO)->render(),
            ),
            "Failed asserting that element renders correctly with 'fill-rule' attribute.",
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Line::class, ['class' => 'default-class']);

        self::assertEquals(
            <<<HTML
            <line class="default-class">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->render(),
            ),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Line::class, []);
    }

    public function testRenderWithHidden(): void
    {
        self::assertEquals(
            <<<HTML
            <line hidden>
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->hidden(true)->render(),
            ),
            "Failed asserting that element renders correctly with 'hidden' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::assertEquals(
            <<<HTML
            <line id="test-id">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->id('test-id')->render(),
            ),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <line lang="es">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->lang(Language::SPANISH)->render(),
            ),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <line opacity="0.5">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->opacity('0.5')->render(),
            ),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithPathLength(): void
    {
        self::assertEquals(
            <<<HTML
            <line pathLength="200">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->pathLength(200)->render(),
            ),
            "Failed asserting that element renders correctly with 'pathLength' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::assertEquals(
            <<<HTML
            <line role="banner">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->role('banner')->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <line role="banner">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->role(Role::BANNER)->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStroke(): void
    {
        self::assertEquals(
            <<<HTML
            <line stroke="#00ff00">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->stroke('#00ff00')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke' attribute.",
        );
    }

    public function testRenderWithStrokeDashArray(): void
    {
        self::assertEquals(
            <<<HTML
            <line stroke-dasharray="5,5">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->strokeDashArray('5,5')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-dasharray' attribute.",
        );
    }

    public function testRenderWithStrokeLineCap(): void
    {
        self::assertEquals(
            <<<HTML
            <line stroke-linecap="round">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->strokeLineCap('round')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineCapUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <line stroke-linecap="square">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->strokeLineCap(StrokeLineCap::SQUARE)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoin(): void
    {
        self::assertEquals(
            <<<HTML
            <line stroke-linejoin="round">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->strokeLineJoin('round')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoinUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <line stroke-linejoin="round">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->strokeLineJoin(StrokeLineJoin::ROUND)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeMiterlimit(): void
    {
        self::assertEquals(
            <<<HTML
            <line stroke-miterlimit="10">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->strokeMiterlimit(10)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-miterlimit' attribute.",
        );
    }

    public function testRenderWithStrokeOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <line stroke-opacity="0.8">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->strokeOpacity(0.8)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-opacity' attribute.",
        );
    }

    public function testRenderWithStrokeWidth(): void
    {
        self::assertEquals(
            <<<HTML
            <line stroke-width="2">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->strokeWidth('2')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-width' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::assertEquals(
            <<<HTML
            <line style='test-value'>
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->style('test-value')->render(),
            ),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTitle(): void
    {
        self::assertEquals(
            <<<HTML
            <line title="test-value">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->title('test-value')->render(),
            ),
            "Failed asserting that element renders correctly with 'title' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::assertEquals(
            <<<HTML
            <line>
            HTML,
            LineEndingNormalizer::normalize(
                (string) Line::tag(),
            ),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::assertEquals(
            <<<HTML
            <line transform="rotate(45)">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->transform('rotate(45)')->render(),
            ),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithTranslate(): void
    {
        self::assertEquals(
            <<<HTML
            <line translate="no">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->translate(false)->render(),
            ),
            "Failed asserting that element renders correctly with 'translate' attribute.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Line::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::assertEquals(
            <<<HTML
            <line class="from-global" id="id-user">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag(['id' => 'id-user'])->render(),
            ),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Line::class, []);
    }

    public function testRenderWithX1(): void
    {
        self::assertEquals(
            <<<HTML
            <line x1="10">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->x1(10)->render(),
            ),
            "Failed asserting that element renders correctly with 'x1' attribute.",
        );
    }

    public function testRenderWithX2(): void
    {
        self::assertEquals(
            <<<HTML
            <line x2="100">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->x2(100)->render(),
            ),
            "Failed asserting that element renders correctly with 'x2' attribute.",
        );
    }

    public function testRenderWithY1(): void
    {
        self::assertEquals(
            <<<HTML
            <line y1="20">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->y1(20)->render(),
            ),
            "Failed asserting that element renders correctly with 'y1' attribute.",
        );
    }

    public function testRenderWithY2(): void
    {
        self::assertEquals(
            <<<HTML
            <line y2="200">
            HTML,
            LineEndingNormalizer::normalize(
                Line::tag()->y2(200)->render(),
            ),
            "Failed asserting that element renders correctly with 'y2' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $line = Line::tag();

        self::assertNotSame(
            $line,
            $line->fill(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->fillOpacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->fillRule(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->opacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->stroke(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->strokeDashArray(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->strokeLineCap(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->strokeLineJoin(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->strokeMiterlimit(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->strokeOpacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->strokeWidth(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->x1(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->x2(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->y1(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $line,
            $line->y2(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingFillOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Line::tag()->fillOpacity('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingFillRuleValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::FILL_RULE->value,
                implode("', '", Enum::normalizeArray(FillRule::cases())),
            ),
        );

        Line::tag()->fillRule('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Line::tag()->opacity('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeLineCapValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::STROKE_LINECAP->value,
                implode("', '", Enum::normalizeArray(StrokeLineCap::cases())),
            ),
        );

        Line::tag()->strokeLineCap('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeLineJoinValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::STROKE_LINEJOIN->value,
                implode("', '", Enum::normalizeArray(StrokeLineJoin::cases())),
            ),
        );

        Line::tag()->strokeLineJoin('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeMiterlimitValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
        );

        Line::tag()->strokeMiterlimit('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Line::tag()->strokeOpacity('invalid-value');
    }
}
