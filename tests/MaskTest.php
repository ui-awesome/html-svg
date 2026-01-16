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
use UIAwesome\Html\Svg\Mask;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, MaskType, SvgAttribute};

/**
 * Test suite for {@see Mask} element functionality and behavior.
 *
 * Validates the management and rendering of the SVG `<mask>` element according to the SVG 2 and CSS Masking
 * specifications.
 *
 * Ensures correct handling, immutability, and validation of the `Mask` tag rendering, supporting all global HTML
 * attributes, content, and mask-specific attributes.
 *
 * Test coverage.
 * - Accurate rendering of the `<mask>` element with inline content.
 * - Correct application of mask-specific attributes like `x`, `y`, `width`, `height`, `maskUnits`, `maskContentUnits`,
 *   and `mask-type`.
 * - Error handling for invalid attribute values.
 * - Immutability of the API, ensuring that setting attributes returns a new instance.
 * - Integration with configuration providers and global factory defaults.
 * - Nested rendering structure using `begin()` and `end()` methods.
 * - Precedence of user-defined attributes over global defaults and provider settings.
 *
 * {@see Mask} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class MaskTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask aria-pressed="true">
            value
            </mask>
            HTML,
            Mask::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask aria-pressed="true">
            value
            </mask>
            HTML,
            Mask::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask data-value="value">
            value
            </mask>
            HTML,
            Mask::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask data-value="value">
            value
            </mask>
            HTML,
            Mask::tag()->addDataAttribute(Data::VALUE, 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </mask>
            HTML,
            Mask::tag()
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
            <mask class="value">
            value
            </mask>
            HTML,
            Mask::tag()->attributes(['class' => 'value'])->content('value')->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask>
            Content
            </mask>
            HTML,
            Mask::tag()->begin() . 'Content' . Mask::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask class="value">
            value
            </mask>
            HTML,
            Mask::tag()->class('value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask>
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->render(),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask data-value="test-value">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask class="default-class">
            value
            </mask>
            HTML,
            Mask::tag(['class' => 'default-class'])->content('value')->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask class="default-class">
            value
            </mask>
            HTML,
            Mask::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Mask::class, ['class' => 'default-class']);

        self::equalsWithoutLE(
            <<<HTML
            <mask class="default-class">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Mask::class, []);
    }

    public function testRenderWithHeight(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask height="120%">
            value
            </mask>
            HTML,
            Mask::tag()->height('120%')->content('value')->render(),
            "Failed asserting that element renders correctly with 'height' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask id="test-id">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->id('test-id')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask lang="es">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->lang(Language::SPANISH)->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithMaskContentUnits(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask maskContentUnits="userSpaceOnUse">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->maskContentUnits('userSpaceOnUse')->render(),
            "Failed asserting that element renders correctly with 'maskContentUnits' attribute.",
        );
    }

    public function testRenderWithMaskContentUnitsUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask maskContentUnits="objectBoundingBox">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->maskContentUnits(CoordinateUnits::OBJECT_BOUNDING_BOX)->render(),
            "Failed asserting that element renders correctly with 'maskContentUnits' attribute using enum.",
        );
    }

    public function testRenderWithMaskType(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask mask-type="luminance">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->maskType('luminance')->render(),
            "Failed asserting that element renders correctly with 'mask-type' attribute.",
        );
    }

    public function testRenderWithMaskTypeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask mask-type="alpha">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->maskType(MaskType::ALPHA)->render(),
            "Failed asserting that element renders correctly with 'mask-type' attribute using enum.",
        );
    }

    public function testRenderWithMaskUnits(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask maskUnits="objectBoundingBox">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->maskUnits('objectBoundingBox')->render(),
            "Failed asserting that element renders correctly with 'maskUnits' attribute.",
        );
    }

    public function testRenderWithMaskUnitsUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask maskUnits="userSpaceOnUse">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->maskUnits(CoordinateUnits::USER_SPACE_ON_USE)->render(),
            "Failed asserting that element renders correctly with 'maskUnits' attribute using enum.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask role="banner">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->role('banner')->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask role="banner">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->role(Role::BANNER)->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask style='test-value'>
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->style('test-value')->render(),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask tabindex="3">
            value
            </mask>
            HTML,
            Mask::tag()->content('value')->tabIndex(3)->render(),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask>
            value
            </mask>
            HTML,
            (string) Mask::tag()->content('value'),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Mask::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <mask class="from-global" id="id-user">
            value
            </mask>
            HTML,
            Mask::tag(['id' => 'id-user'])->content('value')->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Mask::class, []);
    }

    public function testRenderWithWidth(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask width="120%">
            value
            </mask>
            HTML,
            Mask::tag()->width('120%')->content('value')->render(),
            "Failed asserting that element renders correctly with 'width' attribute.",
        );
    }

    public function testRenderWithX(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask x="-10%">
            value
            </mask>
            HTML,
            Mask::tag()->x('-10%')->content('value')->render(),
            "Failed asserting that element renders correctly with 'x' attribute.",
        );
    }

    public function testRenderWithY(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <mask y="-10%">
            value
            </mask>
            HTML,
            Mask::tag()->y('-10%')->content('value')->render(),
            "Failed asserting that element renders correctly with 'y' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $mask = Mask::tag();

        self::assertNotSame(
            $mask,
            $mask->height(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $mask,
            $mask->maskContentUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $mask,
            $mask->maskType(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $mask,
            $mask->maskUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $mask,
            $mask->width(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $mask,
            $mask->x(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $mask,
            $mask->y(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingMaskContentUnitsValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::MASK_CONTENT_UNITS->value,
                implode('\', \'', Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        Mask::tag()->maskContentUnits('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingMaskTypeValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::MASK_TYPE->value,
                implode('\', \'', Enum::normalizeArray(MaskType::cases())),
            ),
        );

        Mask::tag()->maskType('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingMaskUnitsValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::MASK_UNITS->value,
                implode('\', \'', Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        Mask::tag()->maskUnits('invalid-value');
    }
}
