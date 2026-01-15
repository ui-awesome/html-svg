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
use UIAwesome\Html\Svg\Rect;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Values\{FillRule, StrokeLineCap, StrokeLineJoin, SvgAttribute};

/**
 * Test suite for {@see Rect} element functionality and behavior.
 *
 * Validates the management and rendering of the SVG `<rect>` element according to the SVG 2 and HTML Living Standard
 * specifications.
 *
 * Ensures correct handling, immutability, and validation of the `Rect` tag rendering, supporting all global HTML, SVG 2
 * attributes and provider-based configuration.
 *
 * Test coverage.
 * - Accurate rendering of the `<rect>` element.
 * - Correct application of global HTML attributes and SVG-specific attributes.
 * - Error handling for invalid attribute values.
 * - Immutability of the API, ensuring that setting attributes returns a new instance.
 * - Integration with configuration providers and global factory defaults.
 * - Precedence of user-defined attributes over global defaults and provider settings.
 *
 * {@see Rect} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class RectTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAccesskey(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect accesskey="k">
            HTML,
            Rect::tag()->accesskey('k')->render(),
            "Failed asserting that element renders correctly with 'accesskey' attribute.",
        );
    }

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect aria-pressed="true">
            HTML,
            Rect::tag()->addAriaAttribute('pressed', true)->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect aria-pressed="true">
            HTML,
            Rect::tag()->addAriaAttribute(Aria::PRESSED, true)->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect data-value="value">
            HTML,
            Rect::tag()->addDataAttribute('value', 'value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect data-value="value">
            HTML,
            Rect::tag()->addDataAttribute(Data::VALUE, 'value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            HTML,
            Rect::tag()
                ->ariaAttributes(
                    [
                        'controls' => static fn(): string => 'modal-1',
                        'hidden' => false,
                        'label' => 'Close',
                    ],
                )
                ->render(),
            "Failed asserting that element renders correctly with 'ariaAttributes()' method.",
        );
    }

    public function testRenderWithAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect class="value">
            HTML,
            Rect::tag()->attributes(['class' => 'value'])->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect class="value">
            HTML,
            Rect::tag()->class('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect data-value="test-value">
            HTML,
            Rect::tag()->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect class="default-class">
            HTML,
            Rect::tag(['class' => 'default-class'])->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect class="default-class" title="default-title">
            HTML,
            Rect::tag()->addDefaultProvider(DefaultProvider::class)->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithDir(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect dir="rtl">
            HTML,
            Rect::tag()->dir('rtl')->render(),
            "Failed asserting that element renders correctly with 'dir' attribute.",
        );
    }

    public function testRenderWithFill(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect fill="#ff0000">
            HTML,
            Rect::tag()->fill('#ff0000')->render(),
            "Failed asserting that element renders correctly with 'fill' attribute.",
        );
    }

    public function testRenderWithFillOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect fill-opacity="0.7">
            HTML,
            Rect::tag()->fillOpacity('0.7')->render(),
            "Failed asserting that element renders correctly with 'fill-opacity' attribute.",
        );
    }

    public function testRenderWithFillRule(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect fill-rule="evenodd">
            HTML,
            Rect::tag()->fillRule('evenodd')->render(),
            "Failed asserting that element renders correctly with 'fill-rule' attribute.",
        );
    }

    public function testRenderWithFillRuleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect fill-rule="nonzero">
            HTML,
            Rect::tag()->fillRule(FillRule::NONZERO)->render(),
            "Failed asserting that element renders correctly with 'fill-rule' attribute.",
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Rect::class, ['class' => 'default-class']);

        self::equalsWithoutLE(
            <<<HTML
            <rect class="default-class">
            HTML,
            Rect::tag()->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Rect::class, []);
    }

    public function testRenderWithHeight(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect height="150">
            HTML,
            Rect::tag()->height(150)->render(),
            "Failed asserting that element renders correctly with 'height' attribute.",
        );
    }

    public function testRenderWithHidden(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect hidden>
            HTML,
            Rect::tag()->hidden(true)->render(),
            "Failed asserting that element renders correctly with 'hidden' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect id="test-id">
            HTML,
            Rect::tag()->id('test-id')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect lang="es">
            HTML,
            Rect::tag()->lang(Language::SPANISH)->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect opacity="0.5">
            HTML,
            Rect::tag()->opacity('0.5')->render(),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithPathLength(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect pathLength="400">
            HTML,
            Rect::tag()->pathLength(400)->render(),
            "Failed asserting that element renders correctly with 'pathLength' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect role="banner">
            HTML,
            Rect::tag()->role('banner')->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect role="banner">
            HTML,
            Rect::tag()->role(Role::BANNER)->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRx(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect rx="10">
            HTML,
            Rect::tag()->rx(10)->render(),
            "Failed asserting that element renders correctly with 'rx' attribute.",
        );
    }

    public function testRenderWithRy(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect ry="5">
            HTML,
            Rect::tag()->ry(5)->render(),
            "Failed asserting that element renders correctly with 'ry' attribute.",
        );
    }

    public function testRenderWithStroke(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect stroke="#00ff00">
            HTML,
            Rect::tag()->stroke('#00ff00')->render(),
            "Failed asserting that element renders correctly with 'stroke' attribute.",
        );
    }

    public function testRenderWithStrokeDashArray(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect stroke-dasharray="5,5">
            HTML,
            Rect::tag()->strokeDashArray('5,5')->render(),
            "Failed asserting that element renders correctly with 'stroke-dasharray' attribute.",
        );
    }

    public function testRenderWithStrokeLineCap(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect stroke-linecap="round">
            HTML,
            Rect::tag()->strokeLineCap('round')->render(),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineCapUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect stroke-linecap="square">
            HTML,
            Rect::tag()->strokeLineCap(StrokeLineCap::SQUARE)->render(),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoin(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect stroke-linejoin="round">
            HTML,
            Rect::tag()->strokeLineJoin('round')->render(),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoinUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect stroke-linejoin="round">
            HTML,
            Rect::tag()->strokeLineJoin(StrokeLineJoin::ROUND)->render(),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeMiterlimit(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect stroke-miterlimit="10">
            HTML,
            Rect::tag()->strokeMiterlimit(10)->render(),
            "Failed asserting that element renders correctly with 'stroke-miterlimit' attribute.",
        );
    }

    public function testRenderWithStrokeOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect stroke-opacity="0.8">
            HTML,
            Rect::tag()->strokeOpacity(0.8)->render(),
            "Failed asserting that element renders correctly with 'stroke-opacity' attribute.",
        );
    }

    public function testRenderWithStrokeWidth(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect stroke-width="2">
            HTML,
            Rect::tag()->strokeWidth('2')->render(),
            "Failed asserting that element renders correctly with 'stroke-width' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect style='test-value'>
            HTML,
            Rect::tag()->style('test-value')->render(),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTitle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect title="test-value">
            HTML,
            Rect::tag()->title('test-value')->render(),
            "Failed asserting that element renders correctly with 'title' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect>
            HTML,
            (string) Rect::tag(),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect transform="rotate(45)">
            HTML,
            Rect::tag()->transform('rotate(45)')->render(),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithTranslate(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect translate="no">
            HTML,
            Rect::tag()->translate(false)->render(),
            "Failed asserting that element renders correctly with 'translate' attribute.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Rect::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <rect class="from-global" id="id-user">
            HTML,
            Rect::tag(['id' => 'id-user'])->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Rect::class, []);
    }

    public function testRenderWithWidth(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect width="200">
            HTML,
            Rect::tag()->width(200)->render(),
            "Failed asserting that element renders correctly with 'width' attribute.",
        );
    }

    public function testRenderWithX(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect x="50">
            HTML,
            Rect::tag()->x(50)->render(),
            "Failed asserting that element renders correctly with 'x' attribute.",
        );
    }

    public function testRenderWithY(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <rect y="75">
            HTML,
            Rect::tag()->y(75)->render(),
            "Failed asserting that element renders correctly with 'y' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $rect = Rect::tag();

        self::assertNotSame(
            $rect,
            $rect->fill(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->fillOpacity('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->fillRule(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->height(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->opacity('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->pathLength('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->rx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->ry(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->stroke(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->strokeDashArray(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->strokeLineCap(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->strokeLineJoin(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->strokeMiterlimit('1'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->strokeOpacity('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->strokeWidth(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->width(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->x(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $rect,
            $rect->y(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingFillOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Rect::tag()->fillOpacity('invalid-value');
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

        Rect::tag()->fillRule('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Rect::tag()->opacity('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingPathLengthValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_MUST_BE_POSITIVE_NUMBER_OR_NULL->getMessage(),
        );

        Rect::tag()->pathLength('invalid-value');
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

        Rect::tag()->strokeLineCap('invalid-value');
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

        Rect::tag()->strokeLineJoin('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeMiterlimitValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
        );

        Rect::tag()->strokeMiterlimit('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Rect::tag()->strokeOpacity('invalid-value');
    }
}
