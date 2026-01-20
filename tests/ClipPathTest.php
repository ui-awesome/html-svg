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
use UIAwesome\Html\Svg\ClipPath;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SvgAttribute};

/**
 * Unit tests for {@see ClipPath} element rendering, content, and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for {@see ClipPath::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<clipPath>` with inline content.
 * - Renders `<clipPath>` with representative global HTML and SVG attributes.
 * - Supports nested rendering via `begin()` and `end()`.
 *
 * {@see ClipPath} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class ClipPathTest extends TestCase
{
    public function testRenderWithAddAriaAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath aria-pressed="true">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath aria-pressed="true">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath data-value="value">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath data-value="value">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->addDataAttribute(Data::VALUE, 'value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()
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
            <clipPath class="value">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->attributes(['class' => 'value'])->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath>
            Content
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->begin() . 'Content' . ClipPath::end(),
            ),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath class="value">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->class('value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithClipPathUnits(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath clipPathUnits="userSpaceOnUse">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->clipPathUnits('userSpaceOnUse')->render(),
            ),
            "Failed asserting that element renders correctly with 'clipPathUnits' attribute.",
        );
    }

    public function testRenderWithClipPathUnitsUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath clipPathUnits="objectBoundingBox">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->clipPathUnits(CoordinateUnits::OBJECT_BOUNDING_BOX)->render(),
            ),
            "Failed asserting that element renders correctly with 'clipPathUnits' attribute using enum.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath>
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->render(),
            ),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath data-value="test-value">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath class="default-class">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag(['class' => 'default-class'])->content('value')->render(),
            ),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath class="default-class">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            ),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(ClipPath::class, ['class' => 'default-class']);

        self::assertEquals(
            <<<HTML
            <clipPath class="default-class">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->render(),
            ),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(ClipPath::class, []);
    }

    public function testRenderWithId(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath id="test-id">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->id('test-id')->render(),
            ),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath lang="es">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->lang(Language::SPANISH)->render(),
            ),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath opacity="0.5">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->opacity('0.5')->render(),
            ),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath role="banner">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->role('banner')->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath role="banner">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->role(Role::BANNER)->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath style='test-value'>
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->style('test-value')->render(),
            ),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath tabindex="3">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->tabIndex(3)->render(),
            ),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath>
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                (string) ClipPath::tag()->content('value'),
            ),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::assertEquals(
            <<<HTML
            <clipPath transform="rotate(45)">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag()->content('value')->transform('rotate(45)')->render(),
            ),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(ClipPath::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::assertEquals(
            <<<HTML
            <clipPath class="from-global" id="id-user">
            value
            </clipPath>
            HTML,
            LineEndingNormalizer::normalize(
                ClipPath::tag(['id' => 'id-user'])->content('value')->render(),
            ),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(ClipPath::class, []);
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $clipPath = ClipPath::tag();

        self::assertNotSame(
            $clipPath,
            $clipPath->clipPathUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $clipPath,
            $clipPath->opacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $clipPath,
            $clipPath->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingClipPathUnitsValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::CLIP_PATH_UNITS->value,
                implode("', '", Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        ClipPath::tag()->clipPathUnits('invalid-value');
    }
}
