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
use UIAwesome\Html\Svg\Mask;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, MaskType, SvgAttribute};

/**
 * Unit tests for {@see Mask} element rendering, content, and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for {@see Mask::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<mask>` with inline content.
 * - Renders `<mask>` with representative mask and presentation attributes.
 * - Supports nested rendering via `begin()` and `end()`.
 *
 * {@see Mask} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class MaskTest extends TestCase
{
    public function testRenderWithAddAriaAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <mask aria-pressed="true">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <mask aria-pressed="true">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <mask data-value="value">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <mask data-value="value">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->addDataAttribute(Data::VALUE, 'value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <mask aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
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
            ),
            "Failed asserting that element renders correctly with 'ariaAttributes()' method.",
        );
    }

    public function testRenderWithAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <mask class="value">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->attributes(['class' => 'value'])->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::assertEquals(
            <<<HTML
            <mask>
            Content
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->begin() . 'Content' . Mask::end(),
            ),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::assertEquals(
            <<<HTML
            <mask class="value">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->class('value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::assertEquals(
            <<<HTML
            <mask>
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->render(),
            ),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <mask data-value="test-value">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::assertEquals(
            <<<HTML
            <mask class="default-class">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag(['class' => 'default-class'])->content('value')->render(),
            ),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::assertEquals(
            <<<HTML
            <mask class="default-class">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            ),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Mask::class, ['class' => 'default-class']);

        self::assertEquals(
            <<<HTML
            <mask class="default-class">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->render(),
            ),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Mask::class, []);
    }

    public function testRenderWithHeight(): void
    {
        self::assertEquals(
            <<<HTML
            <mask height="120%">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->height('120%')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'height' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::assertEquals(
            <<<HTML
            <mask id="test-id">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->id('test-id')->render(),
            ),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <mask lang="es">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->lang(Language::SPANISH)->render(),
            ),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithMaskContentUnits(): void
    {
        self::assertEquals(
            <<<HTML
            <mask maskContentUnits="userSpaceOnUse">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->maskContentUnits('userSpaceOnUse')->render(),
            ),
            "Failed asserting that element renders correctly with 'maskContentUnits' attribute.",
        );
    }

    public function testRenderWithMaskContentUnitsUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <mask maskContentUnits="objectBoundingBox">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->maskContentUnits(CoordinateUnits::OBJECT_BOUNDING_BOX)->render(),
            ),
            "Failed asserting that element renders correctly with 'maskContentUnits' attribute using enum.",
        );
    }

    public function testRenderWithMaskType(): void
    {
        self::assertEquals(
            <<<HTML
            <mask mask-type="luminance">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->maskType('luminance')->render(),
            ),
            "Failed asserting that element renders correctly with 'mask-type' attribute.",
        );
    }

    public function testRenderWithMaskTypeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <mask mask-type="alpha">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->maskType(MaskType::ALPHA)->render(),
            ),
            "Failed asserting that element renders correctly with 'mask-type' attribute using enum.",
        );
    }

    public function testRenderWithMaskUnits(): void
    {
        self::assertEquals(
            <<<HTML
            <mask maskUnits="objectBoundingBox">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->maskUnits('objectBoundingBox')->render(),
            ),
            "Failed asserting that element renders correctly with 'maskUnits' attribute.",
        );
    }

    public function testRenderWithMaskUnitsUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <mask maskUnits="userSpaceOnUse">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->maskUnits(CoordinateUnits::USER_SPACE_ON_USE)->render(),
            ),
            "Failed asserting that element renders correctly with 'maskUnits' attribute using enum.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::assertEquals(
            <<<HTML
            <mask role="banner">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->role('banner')->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <mask role="banner">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->role(Role::BANNER)->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::assertEquals(
            <<<HTML
            <mask style='test-value'>
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->style('test-value')->render(),
            ),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::assertEquals(
            <<<HTML
            <mask tabindex="3">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->content('value')->tabIndex(3)->render(),
            ),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::assertEquals(
            <<<HTML
            <mask>
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                (string) Mask::tag()->content('value'),
            ),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Mask::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::assertEquals(
            <<<HTML
            <mask class="from-global" id="id-user">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag(['id' => 'id-user'])->content('value')->render(),
            ),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Mask::class, []);
    }

    public function testRenderWithWidth(): void
    {
        self::assertEquals(
            <<<HTML
            <mask width="120%">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->width('120%')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'width' attribute.",
        );
    }

    public function testRenderWithX(): void
    {
        self::assertEquals(
            <<<HTML
            <mask x="-10%">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->x('-10%')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'x' attribute.",
        );
    }

    public function testRenderWithY(): void
    {
        self::assertEquals(
            <<<HTML
            <mask y="-10%">
            value
            </mask>
            HTML,
            LineEndingNormalizer::normalize(
                Mask::tag()->y('-10%')->content('value')->render(),
            ),
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
                implode("', '", Enum::normalizeArray(CoordinateUnits::cases())),
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
                implode("', '", Enum::normalizeArray(MaskType::cases())),
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
                implode("', '", Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        Mask::tag()->maskUnits('invalid-value');
    }
}
