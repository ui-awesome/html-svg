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
use UIAwesome\Html\Svg\Ellipse;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Values\{FillRule, StrokeLineCap, StrokeLineJoin, SvgAttribute};

/**
 * Unit tests for {@see Ellipse} element rendering and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for {@see Ellipse::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<ellipse>` with representative global HTML attributes.
 * - Renders `<ellipse>` with representative SVG attributes.
 *
 * {@see Ellipse} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class EllipseTest extends TestCase
{
    public function testRenderWithAccesskey(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse accesskey="k">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->accesskey('k')->render(),
            ),
            "Failed asserting that element renders correctly with 'accesskey' attribute.",
        );
    }

    public function testRenderWithAddAriaAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse aria-pressed="true">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->addAriaAttribute('pressed', true)->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse aria-pressed="true">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->addAriaAttribute(Aria::PRESSED, true)->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse data-value="value">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->addDataAttribute('value', 'value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse data-value="value">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->addDataAttribute(Data::VALUE, 'value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()
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
            <ellipse class="value">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->attributes(['class' => 'value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse class="value">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->class('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithCx(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse cx="100">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->cx(100)->render(),
            ),
            "Failed asserting that element renders correctly with 'cx' attribute.",
        );
    }

    public function testRenderWithCy(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse cy="150">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->cy(150)->render(),
            ),
            "Failed asserting that element renders correctly with 'cy' attribute.",
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse data-value="test-value">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->dataAttributes(['value' => 'test-value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse class="default-class">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag(['class' => 'default-class'])->render(),
            ),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse class="default-class" title="default-title">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->addDefaultProvider(DefaultProvider::class)->render(),
            ),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithDir(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse dir="rtl">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->dir('rtl')->render(),
            ),
            "Failed asserting that element renders correctly with 'dir' attribute.",
        );
    }

    public function testRenderWithFill(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse fill="#ff0000">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->fill('#ff0000')->render(),
            ),
            "Failed asserting that element renders correctly with 'fill' attribute.",
        );
    }

    public function testRenderWithFillOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse fill-opacity="0.7">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->fillOpacity('0.7')->render(),
            ),
            "Failed asserting that element renders correctly with 'fill-opacity' attribute.",
        );
    }

    public function testRenderWithFillRule(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse fill-rule="evenodd">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->fillRule('evenodd')->render(),
            ),
            "Failed asserting that element renders correctly with 'fill-rule' attribute.",
        );
    }

    public function testRenderWithFillRuleUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse fill-rule="nonzero">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->fillRule(FillRule::NONZERO)->render(),
            ),
            "Failed asserting that element renders correctly with 'fill-rule' attribute.",
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Ellipse::class, ['class' => 'default-class']);

        self::assertEquals(
            <<<HTML
            <ellipse class="default-class">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->render(),
            ),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Ellipse::class, []);
    }

    public function testRenderWithHidden(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse hidden>
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->hidden(true)->render(),
            ),
            "Failed asserting that element renders correctly with 'hidden' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse id="test-id">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->id('test-id')->render(),
            ),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse lang="es">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->lang(Language::SPANISH)->render(),
            ),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse opacity="0.5">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->opacity('0.5')->render(),
            ),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithPathLength(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse pathLength="200">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->pathLength(200)->render(),
            ),
            "Failed asserting that element renders correctly with 'pathLength' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse role="banner">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->role('banner')->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse role="banner">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->role(Role::BANNER)->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRx(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse rx="80">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->rx(80)->render(),
            ),
            "Failed asserting that element renders correctly with 'rx' attribute.",
        );
    }

    public function testRenderWithRy(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse ry="40">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->ry(40)->render(),
            ),
            "Failed asserting that element renders correctly with 'ry' attribute.",
        );
    }

    public function testRenderWithStroke(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse stroke="#00ff00">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->stroke('#00ff00')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke' attribute.",
        );
    }

    public function testRenderWithStrokeDashArray(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse stroke-dasharray="5,5">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->strokeDashArray('5,5')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-dasharray' attribute.",
        );
    }

    public function testRenderWithStrokeLineCap(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse stroke-linecap="round">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->strokeLineCap('round')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineCapUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse stroke-linecap="square">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->strokeLineCap(StrokeLineCap::SQUARE)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoin(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse stroke-linejoin="round">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->strokeLineJoin('round')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoinUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse stroke-linejoin="round">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->strokeLineJoin(StrokeLineJoin::ROUND)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeMiterlimit(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse stroke-miterlimit="10">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->strokeMiterlimit(10)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-miterlimit' attribute.",
        );
    }

    public function testRenderWithStrokeOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse stroke-opacity="0.8">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->strokeOpacity(0.8)->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-opacity' attribute.",
        );
    }

    public function testRenderWithStrokeWidth(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse stroke-width="2">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->strokeWidth('2')->render(),
            ),
            "Failed asserting that element renders correctly with 'stroke-width' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse style='test-value'>
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->style('test-value')->render(),
            ),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTitle(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse title="test-value">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->title('test-value')->render(),
            ),
            "Failed asserting that element renders correctly with 'title' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse>
            HTML,
            LineEndingNormalizer::normalize(
                (string) Ellipse::tag(),
            ),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse transform="rotate(45)">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->transform('rotate(45)')->render(),
            ),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithTranslate(): void
    {
        self::assertEquals(
            <<<HTML
            <ellipse translate="no">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag()->translate(false)->render(),
            ),
            "Failed asserting that element renders correctly with 'translate' attribute.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Ellipse::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::assertEquals(
            <<<HTML
            <ellipse class="from-global" id="id-user">
            HTML,
            LineEndingNormalizer::normalize(
                Ellipse::tag(['id' => 'id-user'])->render(),
            ),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Ellipse::class, []);
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $ellipse = Ellipse::tag();

        self::assertNotSame(
            $ellipse,
            $ellipse->cx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->cy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->fill(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->fillOpacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->fillRule(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->opacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->pathLength(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->rx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->ry(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->stroke(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->strokeDashArray(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->strokeLineCap(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->strokeLineJoin(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->strokeMiterlimit(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->strokeOpacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->strokeWidth(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $ellipse,
            $ellipse->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingFillOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Ellipse::tag()->fillOpacity('invalid-value');
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

        Ellipse::tag()->fillRule('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Ellipse::tag()->opacity('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingPathLengthValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_MUST_BE_POSITIVE_NUMBER_OR_NULL->getMessage(),
        );

        Ellipse::tag()->pathLength('invalid-value');
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

        Ellipse::tag()->strokeLineCap('invalid-value');
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

        Ellipse::tag()->strokeLineJoin('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeMiterlimitValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
        );

        Ellipse::tag()->strokeMiterlimit('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStrokeOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Ellipse::tag()->strokeOpacity('invalid-value');
    }
}
