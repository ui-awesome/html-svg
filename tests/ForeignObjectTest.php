<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPForge\Support\LineEndingNormalizer;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Values\{Aria, Data, Language, Role};
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\ForeignObject;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;

/**
 * Unit tests for {@see ForeignObject} element rendering, content, and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for
 * {@see ForeignObject::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<foreignObject>` with inline content.
 * - Renders `<foreignObject>` with representative global HTML and SVG attributes.
 * - Supports nested rendering via `begin()` and `end()`.
 *
 * {@see ForeignObject} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class ForeignObjectTest extends TestCase
{
    public function testRenderWithAddAriaAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject aria-pressed="true">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject aria-pressed="true">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject data-value="value">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject data-value="value">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->addDataAttribute(Data::VALUE, 'value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()
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
            <foreignObject class="value">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->attributes(['class' => 'value'])->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject>
            Content
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->begin() . 'Content' . ForeignObject::end(),
            ),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject class="value">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->class('value')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject>
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->render(),
            ),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject data-value="test-value">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            ),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject class="default-class">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag(['class' => 'default-class'])->content('value')->render(),
            ),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject class="default-class">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            ),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(ForeignObject::class, ['class' => 'default-class']);

        self::assertEquals(
            <<<HTML
            <foreignObject class="default-class">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->render(),
            ),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(ForeignObject::class, []);
    }

    public function testRenderWithHeight(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject height="100">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->height('100')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'height' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject id="test-id">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->id('test-id')->render(),
            ),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject lang="es">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->lang(Language::SPANISH)->render(),
            ),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject opacity="0.5">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->opacity('0.5')->render(),
            ),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject role="banner">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->role('banner')->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject role="banner">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->role(Role::BANNER)->render(),
            ),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject style='test-value'>
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->style('test-value')->render(),
            ),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject tabindex="3">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->tabIndex(3)->render(),
            ),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject>
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                (string) ForeignObject::tag()->content('value'),
            ),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject transform="rotate(45)">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->content('value')->transform('rotate(45)')->render(),
            ),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(ForeignObject::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::assertEquals(
            <<<HTML
            <foreignObject class="from-global" id="id-user">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag(['id' => 'id-user'])->content('value')->render(),
            ),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(ForeignObject::class, []);
    }

    public function testRenderWithWidth(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject width="100">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->width('100')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'width' attribute.",
        );
    }

    public function testRenderWithX(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject x="10">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->x('10')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'x' attribute.",
        );
    }

    public function testRenderWithY(): void
    {
        self::assertEquals(
            <<<HTML
            <foreignObject y="10">
            value
            </foreignObject>
            HTML,
            LineEndingNormalizer::normalize(
                ForeignObject::tag()->y('10')->content('value')->render(),
            ),
            "Failed asserting that element renders correctly with 'y' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $foreignObject = ForeignObject::tag();

        self::assertNotSame(
            $foreignObject,
            $foreignObject->height(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $foreignObject,
            $foreignObject->opacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $foreignObject,
            $foreignObject->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $foreignObject,
            $foreignObject->width(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $foreignObject,
            $foreignObject->x(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $foreignObject,
            $foreignObject->y(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        ForeignObject::tag()->opacity('invalid-value');
    }
}
