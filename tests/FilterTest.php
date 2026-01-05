<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Core\Values\{Aria, DataProperty, Language, Role};
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Svg\Filter;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Values\CoordinateUnits;

/**
 * Test suite for {@see Filter} element functionality and behavior.
 *
 * Validates the management and rendering of the SVG `<filter>` element according to the SVG and HTML Living Standard
 * specifications.
 *
 * Ensures correct handling, immutability, and validation of the `<filter>` tag rendering, supporting all global HTML
 * and SVG attributes, content, and provider-based configuration.
 *
 * Test coverage.
 * - Accurate rendering of the `<filter>` element with inline content.
 * - Correct application of global HTML attributes and SVG-specific attributes like `fill`, and `transform`.
 * - Error handling for invalid attributes or configuration.
 * - Immutability of the API, ensuring that setting attributes returns a new instance.
 * - Integration with configuration providers and global factory defaults.
 * - Nested rendering structure using `begin()` and `end()` methods.
 * - Precedence of user-defined attributes over global defaults and provider settings.
 *
 * {@see Filter} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class FilterTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter aria-pressed="true">
            value
            </filter>
            HTML,
            Filter::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter aria-pressed="true">
            value
            </filter>
            HTML,
            Filter::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter data-value="value">
            value
            </filter>
            HTML,
            Filter::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter data-value="value">
            value
            </filter>
            HTML,
            Filter::tag()->addDataAttribute(DataProperty::VALUE, 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </filter>
            HTML,
            Filter::tag()
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
            <filter class="value">
            value
            </filter>
            HTML,
            Filter::tag()->attributes(['class' => 'value'])->content('value')->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter>
            Content
            </filter>
            HTML,
            Filter::tag()->content('value')->begin() . 'Content' . Filter::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter class="value">
            value
            </filter>
            HTML,
            Filter::tag()->class('value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter>
            value
            </filter>
            HTML,
            Filter::tag()->content('value')->render(),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter data-value="test-value">
            value
            </filter>
            HTML,
            Filter::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter class="default-class">
            value
            </filter>
            HTML,
            Filter::tag(['class' => 'default-class'])->content('value')->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter class="default-class">
            value
            </filter>
            HTML,
            Filter::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithFilterUnits(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter filterUnits="userSpaceOnUse">
            value
            </filter>
            HTML,
            Filter::tag()->filterUnits('userSpaceOnUse')->content('value')->render(),
            "Failed asserting that element renders correctly with 'filterUnits' attribute.",
        );
    }

    public function testRenderWithFilterUnitsUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter filterUnits="userSpaceOnUse">
            value
            </filter>
            HTML,
            Filter::tag()->filterUnits(CoordinateUnits::USER_SPACE_ON_USE)->content('value')->render(),
            "Failed asserting that element renders correctly with 'filterUnits' attribute.",
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Filter::class, ['class' => 'default-class']);

        self::equalsWithoutLE(
            <<<HTML
            <filter class="default-class">
            value
            </filter>
            HTML,
            Filter::tag()->content('value')->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Filter::class, []);
    }

    public function testRenderWithHeight(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter height="100">
            value
            </filter>
            HTML,
            Filter::tag()->height('100')->content('value')->render(),
            "Failed asserting that element renders correctly with 'height' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter id="test-id">
            value
            </filter>
            HTML,
            Filter::tag()->content('value')->id('test-id')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter lang="es">
            value
            </filter>
            HTML,
            Filter::tag()->content('value')->lang(Language::SPANISH)->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithPrimitiveUnits(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter primitiveUnits="objectBoundingBox">
            value
            </filter>
            HTML,
            Filter::tag()->primitiveUnits('objectBoundingBox')->content('value')->render(),
            "Failed asserting that element renders correctly with 'primitiveUnits' attribute.",
        );
    }

    public function testRenderWithPrimitiveUnitsUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter primitiveUnits="objectBoundingBox">
            value
            </filter>
            HTML,
            Filter::tag()->primitiveUnits(CoordinateUnits::OBJECT_BOUNDING_BOX)->content('value')->render(),
            "Failed asserting that element renders correctly with 'primitiveUnits' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter role="banner">
            value
            </filter>
            HTML,
            Filter::tag()->content('value')->role('banner')->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter role="banner">
            value
            </filter>
            HTML,
            Filter::tag()->content('value')->role(Role::BANNER)->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter style='test-value'>
            value
            </filter>
            HTML,
            Filter::tag()->content('value')->style('test-value')->render(),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter tabindex="3">
            value
            </filter>
            HTML,
            Filter::tag()->content('value')->tabIndex(3)->render(),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter>
            value
            </filter>
            HTML,
            (string) Filter::tag()->content('value'),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Filter::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <filter class="from-global" id="id-user">
            value
            </filter>
            HTML,
            Filter::tag(['id' => 'id-user'])->content('value')->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Filter::class, []);
    }

    public function testRenderWithWidth(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter width="100">
            value
            </filter>
            HTML,
            Filter::tag()->width('100')->content('value')->render(),
            "Failed asserting that element renders correctly with 'width' attribute.",
        );
    }

    public function testRenderWithX(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter x="10">
            value
            </filter>
            HTML,
            Filter::tag()->x('10')->content('value')->render(),
            "Failed asserting that element renders correctly with 'x' attribute.",
        );
    }

    public function testRenderWithY(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <filter y="10">
            value
            </filter>
            HTML,
            Filter::tag()->y('10')->content('value')->render(),
            "Failed asserting that element renders correctly with 'y' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $filter = Filter::tag();

        self::assertNotSame(
            $filter,
            $filter->filterUnits('userSpaceOnUse'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $filter,
            $filter->height('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $filter,
            $filter->primitiveUnits('objectBoundingBox'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $filter,
            $filter->width('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $filter,
            $filter->x('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $filter,
            $filter->y('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidFilterUnitsValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                'filterUnits',
                implode('\', \'', Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        Filter::tag()->filterUnits('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingInvalidPrimitiveUnitsValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                'primitiveUnits',
                implode('\', \'', Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        Filter::tag()->primitiveUnits('invalid-value');
    }
}
