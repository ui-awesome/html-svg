<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Svg\RadialGradient;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SpreadMethod, SvgAttribute};

/**
 * Unit tests for {@see RadialGradient} element rendering, content, and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for {@see RadialGradient::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<radialGradient>` with inline content.
 * - Renders `<radialGradient>` with representative gradient and geometry attributes.
 * - Supports nested rendering via `begin()` and `end()`.
 *
 * {@see RadialGradient} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('radialGradient')]
final class RadialGradientTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient aria-pressed="true">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient aria-pressed="true">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->addAriaAttribute(\UIAwesome\Html\Attribute\Values\Aria::PRESSED, true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient data-value="value">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient data-value="value">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->addDataAttribute(\UIAwesome\Html\Attribute\Values\Data::VALUE, 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()
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
            <radialGradient class="value">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->attributes(['class' => 'value'])->content('value')->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient>
            Content
            </radialGradient>
            HTML,
            RadialGradient::tag()->begin() . 'Content' . RadialGradient::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient class="gradient-style">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->class('gradient-style')->content('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient>
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->render(),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithCx(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient cx="50%">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->cx('50%')->render(),
            "Failed asserting that element renders correctly with 'cx' attribute.",
        );
    }

    public function testRenderWithCy(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient cy="50%">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->cy('50%')->render(),
            "Failed asserting that element renders correctly with 'cy' attribute.",
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient data-value="test-value">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient class="default-class">
            </radialGradient>
            HTML,
            RadialGradient::tag(['class' => 'default-class'])->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient class="default-class">
            </radialGradient>
            HTML,
            RadialGradient::tag()->addDefaultProvider(DefaultProvider::class)->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithFr(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient fr="10%">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->fr('10%')->render(),
            "Failed asserting that element renders correctly with 'fr' attribute.",
        );
    }

    public function testRenderWithFx(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient fx="60%">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->fx('60%')->render(),
            "Failed asserting that element renders correctly with 'fx' attribute.",
        );
    }

    public function testRenderWithFy(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient fy="60%">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->fy('60%')->render(),
            "Failed asserting that element renders correctly with 'fy' attribute.",
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(RadialGradient::class, ['class' => 'default-class']);

        self::equalsWithoutLE(
            <<<HTML
            <radialGradient class="default-class">
            </radialGradient>
            HTML,
            RadialGradient::tag()->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(RadialGradient::class, []);
    }

    public function testRenderWithGradientTransform(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient gradientTransform="rotate(90)">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->gradientTransform('rotate(90)')->render(),
            "Failed asserting that element renders correctly with 'gradientTransform' attribute.",
        );
    }

    public function testRenderWithGradientUnits(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient gradientUnits="userSpaceOnUse">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->gradientUnits('userSpaceOnUse')->render(),
            "Failed asserting that element renders correctly with 'gradientUnits' attribute.",
        );
    }

    public function testRenderWithGradientUnitsUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient gradientUnits="objectBoundingBox">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->gradientUnits(CoordinateUnits::OBJECT_BOUNDING_BOX)->render(),
            "Failed asserting that element renders correctly with 'gradientUnits' attribute using enum.",
        );
    }

    public function testRenderWithHref(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient href="#myGradient">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->href('#myGradient')->render(),
            "Failed asserting that element renders correctly with 'href' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient id="gradient1">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->id('gradient1')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLang(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient lang="es">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->lang('es')->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient opacity="0.5">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->opacity('0.5')->render(),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithR(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient r="50%">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->r('50%')->render(),
            "Failed asserting that element renders correctly with 'r' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient role="banner">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->role('banner')->content('value')->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithSpreadMethod(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient spreadMethod="reflect">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->spreadMethod('reflect')->render(),
            "Failed asserting that element renders correctly with 'spreadMethod' attribute.",
        );
    }

    public function testRenderWithSpreadMethodUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient spreadMethod="repeat">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->spreadMethod(SpreadMethod::REPEAT)->render(),
            "Failed asserting that element renders correctly with 'spreadMethod' attribute using enum.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient style='test-value'>
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->style('test-value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient tabindex="3">
            value
            </radialGradient>
            HTML,
            RadialGradient::tag()->content('value')->tabIndex(3)->render(),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <radialGradient>
            value
            </radialGradient>
            HTML,
            (string) RadialGradient::tag()->content('value'),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(RadialGradient::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <radialGradient class="from-global" id="id-user">
            </radialGradient>
            HTML,
            RadialGradient::tag(['id' => 'id-user'])->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(RadialGradient::class, []);
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $gradient = RadialGradient::tag();

        self::assertNotSame(
            $gradient,
            $gradient->cx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->cy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->fx(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->fy(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->fr(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
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
            $gradient->href(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->opacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->r(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->spreadMethod(''),
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

        RadialGradient::tag()->gradientUnits('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            \UIAwesome\Html\Svg\Exception\Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        RadialGradient::tag()->opacity('invalid-value');
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

        RadialGradient::tag()->spreadMethod('invalid-value');
    }
}
