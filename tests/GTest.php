<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Values\{Aria, Data, Language, Role};
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Svg\G;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Values\{FillRule, StrokeLineCap, StrokeLineJoin, SvgAttribute};

/**
 * Test suite for {@see G} element functionality and behavior.
 *
 * Validates the management and rendering of the SVG `<g>` element according to the SVG and HTML Living Standard
 * specifications.
 *
 * Ensures correct handling, immutability, and validation of the `<g>` tag rendering, supporting all global HTML and SVG
 * attributes, content, and provider-based configuration.
 *
 * Test coverage.
 * - Accurate rendering of the `<g>` element with inline content.
 * - Correct application of global HTML attributes and SVG-specific attributes like `fill`, and `transform`.
 * - Error handling for invalid attribute values.
 * - Immutability of the API, ensuring that setting attributes returns a new instance.
 * - Integration with configuration providers and global factory defaults.
 * - Nested rendering structure using `begin()` and `end()` methods.
 * - Precedence of user-defined attributes over global defaults and provider settings.
 *
 * {@see G} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class GTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g aria-pressed="true">
            value
            </g>
            HTML,
            G::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g aria-pressed="true">
            value
            </g>
            HTML,
            G::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g data-value="value">
            value
            </g>
            HTML,
            G::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g data-value="value">
            value
            </g>
            HTML,
            G::tag()->addDataAttribute(Data::VALUE, 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </g>
            HTML,
            G::tag()
                ->ariaAttributes(
                    [
                        'controls' => static fn(): string => 'modal-1',
                        'hidden' => false,
                        'label' => 'Close',
                    ],
                )
                ->content('value')
                ->render(),
            "Failed asserting that element renders correctly with 'ariaAttributes()' method.",
        );
    }

    public function testRenderWithAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g class="value">
            value
            </g>
            HTML,
            G::tag()->attributes(['class' => 'value'])->content('value')->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g>
            Content
            </g>
            HTML,
            G::tag()->begin() . 'Content' . G::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g class="value">
            value
            </g>
            HTML,
            G::tag()->class('value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g>
            value
            </g>
            HTML,
            G::tag()->content('value')->render(),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g data-value="test-value">
            value
            </g>
            HTML,
            G::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g class="default-class">
            value
            </g>
            HTML,
            G::tag(['class' => 'default-class'])->content('value')->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g class="default-class">
            value
            </g>
            HTML,
            G::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithFill(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g fill="#ff0000">
            value
            </g>
            HTML,
            G::tag()->fill('#ff0000')->content('value')->render(),
            "Failed asserting that element renders correctly with 'fill' attribute.",
        );
    }

    public function testRenderWithFillOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g fill-opacity="0.7">
            value
            </g>
            HTML,
            G::tag()->content('value')->fillOpacity('0.7')->render(),
            "Failed asserting that element renders correctly with 'fill-opacity' attribute.",
        );
    }

    public function testRenderWithFillRule(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g fill-rule="evenodd">
            value
            </g>
            HTML,
            G::tag()->content('value')->fillRule('evenodd')->render(),
            "Failed asserting that element renders correctly with 'fill-rule' attribute.",
        );
    }

    public function testRenderWithFillRuleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g fill-rule="nonzero">
            value
            </g>
            HTML,
            G::tag()->content('value')->fillRule(FillRule::NONZERO)->render(),
            "Failed asserting that element renders correctly with 'fill-rule' attribute.",
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(G::class, ['class' => 'default-class']);

        self::equalsWithoutLE(
            <<<HTML
            <g class="default-class">
            value
            </g>
            HTML,
            G::tag()->content('value')->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(G::class, []);
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g id="test-id">
            value
            </g>
            HTML,
            G::tag()->content('value')->id('test-id')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g lang="es">
            value
            </g>
            HTML,
            G::tag()->content('value')->lang(Language::SPANISH)->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g opacity="0.5">
            value
            </g>
            HTML,
            G::tag()->content('value')->opacity('0.5')->render(),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g role="banner">
            value
            </g>
            HTML,
            G::tag()->content('value')->role('banner')->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g role="banner">
            value
            </g>
            HTML,
            G::tag()->content('value')->role(Role::BANNER)->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStroke(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g stroke="#00ff00">
            value
            </g>
            HTML,
            G::tag()->content('value')->stroke('#00ff00')->render(),
            "Failed asserting that element renders correctly with 'stroke' attribute.",
        );
    }

    public function testRenderWithStrokeDashArray(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g stroke-dasharray="5,5">
            value
            </g>
            HTML,
            G::tag()->content('value')->strokeDashArray('5,5')->render(),
            "Failed asserting that element renders correctly with 'stroke-dasharray' attribute.",
        );
    }

    public function testRenderWithStrokeLineCap(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g stroke-linecap="round">
            value
            </g>
            HTML,
            G::tag()->content('value')->strokeLineCap('round')->render(),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineCapUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g stroke-linecap="square">
            value
            </g>
            HTML,
            G::tag()->content('value')->strokeLineCap(StrokeLineCap::SQUARE)->render(),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoin(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g stroke-linejoin="round">
            value
            </g>
            HTML,
            G::tag()->content('value')->strokeLineJoin('round')->render(),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoinUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g stroke-linejoin="round">
            value
            </g>
            HTML,
            G::tag()->content('value')->strokeLineJoin(StrokeLineJoin::ROUND)->render(),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeMiterlimit(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g stroke-miterlimit="10">
            value
            </g>
            HTML,
            G::tag()->content('value')->strokeMiterlimit(10)->render(),
            "Failed asserting that element renders correctly with 'stroke-miterlimit' attribute.",
        );
    }

    public function testRenderWithStrokeOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g stroke-opacity="0.8">
            value
            </g>
            HTML,
            G::tag()->content('value')->strokeOpacity(0.8)->render(),
            "Failed asserting that element renders correctly with 'stroke-opacity' attribute.",
        );
    }

    public function testRenderWithStrokeWidth(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g stroke-width="2">
            value
            </g>
            HTML,
            G::tag()->content('value')->strokeWidth('2')->render(),
            "Failed asserting that element renders correctly with 'stroke-width' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g style='test-value'>
            value
            </g>
            HTML,
            G::tag()->content('value')->style('test-value')->render(),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g tabindex="3">
            value
            </g>
            HTML,
            G::tag()->content('value')->tabIndex(3)->render(),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g>
            value
            </g>
            HTML,
            (string) G::tag()->content('value'),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <g transform="rotate(45)">
            value
            </g>
            HTML,
            G::tag()->content('value')->transform('rotate(45)')->render(),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(G::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <g class="from-global" id="id-user">
            value
            </g>
            HTML,
            G::tag(['id' => 'id-user'])->content('value')->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(G::class, []);
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $g = G::tag();

        self::assertNotSame(
            $g,
            $g->fill(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->fillOpacity('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->fillRule(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->opacity('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->stroke(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->strokeDashArray(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->strokeLineCap(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->strokeLineJoin(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->strokeMiterlimit('1'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->strokeOpacity('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->strokeWidth(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $g,
            $g->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingFillOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        G::tag()->fillOpacity('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingFillRuleValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::FILL_RULE->value,
                implode('\', \'', Enum::normalizeArray(FillRule::cases())),
            ),
        );

        G::tag()->fillRule('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        G::tag()->opacity('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeLineCapValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::STROKE_LINECAP->value,
                implode('\', \'', Enum::normalizeArray(StrokeLineCap::cases())),
            ),
        );

        G::tag()->strokeLineCap('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeLineJoinValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::STROKE_LINEJOIN->value,
                implode('\', \'', Enum::normalizeArray(StrokeLineJoin::cases())),
            ),
        );

        G::tag()->strokeLineJoin('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeMiterlimitValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
        );

        G::tag()->strokeMiterlimit('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        G::tag()->strokeOpacity('invalid-value');
    }
}
