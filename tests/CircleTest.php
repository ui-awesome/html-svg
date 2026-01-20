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
use UIAwesome\Html\Svg\Circle;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Values\{FillRule, StrokeLineCap, StrokeLineJoin, SvgAttribute};

/**
 * Unit tests for {@see Circle} element rendering and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for {@see Circle::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<circle>` with representative global HTML attributes.
 * - Renders `<circle>` with representative SVG attributes.
 *
 * {@see Circle} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class CircleTest extends TestCase
{
    public function testRenderWithAccesskey(): void
    {
        self::assertEquals(
            <<<HTML
            <circle accesskey="k">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->accesskey('k')->render(),
            ),
            "Failed asserting that element renders correctly with 'accesskey' attribute.",
        );
    }

    public function testRenderWithAddAriaAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <circle aria-pressed="true">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->addAriaAttribute('pressed', true)->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <circle aria-pressed="true">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->addAriaAttribute(Aria::PRESSED, true)->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <circle data-value="value">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->addDataAttribute('value', 'value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <circle data-value="value">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->addDataAttribute(Data::VALUE, 'value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <circle aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()
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
            <circle class="value">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->attributes(['class' => 'value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::assertEquals(
            <<<HTML
            <circle class="value">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->class('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithCx(): void
    {
        self::assertEquals(
            <<<HTML
            <circle cx="100">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->cx(100)->render(),
            ),
            "Failed asserting that element renders correctly with 'cx' attribute.",
        );
    }

    public function testRenderWithCy(): void
    {
        self::assertEquals(
            <<<HTML
            <circle cy="150">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->cy(150)->render(),
            ),
            "Failed asserting that element renders correctly with 'cy' attribute.",
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <circle data-value="test-value">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->dataAttributes(['value' => 'test-value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::assertEquals(
            <<<HTML
            <circle class="default-class">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag(['class' => 'default-class'])->render(),
            ),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::assertEquals(
            <<<HTML
            <circle class="default-class" title="default-title">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->addDefaultProvider(DefaultProvider::class)->render(),
            ),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithDir(): void
    {
        self::assertEquals(
            <<<HTML
            <circle dir="rtl">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->dir('rtl')->render(),
            ),
            "Failed asserting that element renders correctly with 'dir' attribute.",
        );
    }

    public function testRenderWithFill(): void
    {
        self::assertEquals(
            <<<HTML
            <circle fill="#ff0000">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->fill('#ff0000')->render(),
            ),
            "Failed asserting that element renders correctly with 'fill' attribute.",
        );
    }

    public function testRenderWithFillOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <circle fill-opacity="0.7">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->fillOpacity('0.7')->render(),
            ),
            "Failed asserting that element renders correctly with 'fill-opacity' attribute.",
        );
    }

    public function testRenderWithFillRule(): void
    {
        self::assertEquals(
            <<<HTML
            <circle fill-rule="evenodd">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->fillRule('evenodd')->render(),
            ),
            "Failed asserting that element renders correctly with 'fill-rule' attribute.",
        );
    }

    public function testRenderWithFillRuleUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <circle fill-rule="nonzero">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->fillRule(FillRule::NONZERO)->render(),
            ),
            "Failed asserting that element renders correctly with 'fill-rule' attribute.",
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Circle::class, ['class' => 'default-class']);

        self::assertEquals(
            <<<HTML
            <circle class="default-class">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->render(),
            ),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Circle::class, []);
    }

    public function testRenderWithHidden(): void
    {
        self::assertEquals(
            <<<HTML
            <circle hidden>
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->hidden(true)->render(),
            ),
            "Failed asserting that element renders correctly with 'hidden' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::assertEquals(
            <<<HTML
            <circle id="test-id">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->id('test-id')->render(),
            ),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <circle lang="es">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->lang(Language::SPANISH)->render(),
            ),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <circle opacity="0.5">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->opacity('0.5')->render(),
            ),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithR(): void
    {
        self::assertEquals(
            <<<HTML
            <circle r="50">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->r(50)->render(),
            ),
            "Failed asserting that element renders correctly with 'r' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::assertEquals(
            <<<HTML
            <circle role="banner">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->role('banner')->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <circle role="banner">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->role(Role::BANNER)->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStroke(): void
    {
        self::assertEquals(
            <<<HTML
            <circle stroke="#00ff00">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->stroke('#00ff00')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke' attribute.",
        );
    }

    public function testRenderWithStrokeDashArray(): void
    {
        self::assertEquals(
            <<<HTML
            <circle stroke-dasharray="5,5">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->strokeDashArray('5,5')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-dasharray' attribute.",
        );
    }

    public function testRenderWithStrokeLineCap(): void
    {
        self::assertEquals(
            <<<HTML
            <circle stroke-linecap="round">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->strokeLineCap('round')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineCapUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <circle stroke-linecap="square">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->strokeLineCap(StrokeLineCap::SQUARE)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoin(): void
    {
        self::assertEquals(
            <<<HTML
            <circle stroke-linejoin="round">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->strokeLineJoin('round')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoinUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <circle stroke-linejoin="round">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->strokeLineJoin(StrokeLineJoin::ROUND)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeMiterlimit(): void
    {
        self::assertEquals(
            <<<HTML
            <circle stroke-miterlimit="10">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->strokeMiterlimit(10)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-miterlimit' attribute.",
        );
    }

    public function testRenderWithStrokeOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <circle stroke-opacity="0.8">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->strokeOpacity(0.8)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-opacity' attribute.",
        );
    }

    public function testRenderWithStrokeWidth(): void
    {
        self::assertEquals(
            <<<HTML
            <circle stroke-width="2">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->strokeWidth('2')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-width' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::assertEquals(
            <<<HTML
            <circle style='test-value'>
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->style('test-value')->render(),
            ),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTitle(): void
    {
        self::assertEquals(
            <<<HTML
            <circle title="test-value">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->title('test-value')->render(),
            ),
            "Failed asserting that element renders correctly with 'title' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::assertEquals(
            <<<HTML
            <circle>
            HTML,
            LineEndingNormalizer::normalize(
                (string) Circle::tag(),
            ),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::assertEquals(
            <<<HTML
            <circle transform="rotate(45)">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->transform('rotate(45)')->render(),
            ),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithTranslate(): void
    {
        self::assertEquals(
            <<<HTML
            <circle translate="no">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag()->translate(false)->render(),
            ),
            "Failed asserting that element renders correctly with 'translate' attribute.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Circle::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::assertEquals(
            <<<HTML
            <circle class="from-global" id="id-user">
            HTML,
            LineEndingNormalizer::normalize(
                Circle::tag(['id' => 'id-user'])->render(),
            ),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Circle::class, []);
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $circle = Circle::tag();

        self::assertNotSame(
            $circle,
            $circle->cx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->cy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->fill(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->fillOpacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->fillRule(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->opacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->r(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->stroke(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->strokeDashArray(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->strokeLineCap(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->strokeLineJoin(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->strokeMiterlimit(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->strokeOpacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->strokeWidth(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $circle,
            $circle->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingFillOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Circle::tag()->fillOpacity('invalid-value');
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

        Circle::tag()->fillRule('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Circle::tag()->opacity('invalid-value');
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

        Circle::tag()->strokeLineCap('invalid-value');
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

        Circle::tag()->strokeLineJoin('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeMiterlimitValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
        );

        Circle::tag()->strokeMiterlimit('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Circle::tag()->strokeOpacity('invalid-value');
    }
}
