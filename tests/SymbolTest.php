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
use UIAwesome\Html\Svg\Symbol;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Values\{PreserveAspectRatio, SvgAttribute};

/**
 * Unit tests for {@see Symbol} element rendering, content, and attribute handling.
 *
 * Verifies rendered output, configuration precedence, immutability, and validation behavior for {@see Symbol::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Ensures fluent setters return new instances (immutability).
 * - Handles invalid attribute values by throwing exceptions with expected messages.
 * - Renders `<symbol>` with inline content.
 * - Renders `<symbol>` with representative symbol and view attributes.
 * - Supports nested rendering via `begin()` and `end()`.
 *
 * {@see Symbol} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class SymbolTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol aria-pressed="true">
            value
            </symbol>
            HTML,
            Symbol::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol aria-pressed="true">
            value
            </symbol>
            HTML,
            Symbol::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol data-value="value">
            value
            </symbol>
            HTML,
            Symbol::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol data-value="value">
            value
            </symbol>
            HTML,
            Symbol::tag()->addDataAttribute(Data::VALUE, 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </symbol>
            HTML,
            Symbol::tag()
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
            <symbol class="value">
            value
            </symbol>
            HTML,
            Symbol::tag()->attributes(['class' => 'value'])->content('value')->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol>
            Content
            </symbol>
            HTML,
            Symbol::tag()->begin() . 'Content' . Symbol::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol class="icon-template">
            value
            </symbol>
            HTML,
            Symbol::tag()->class('icon-template')->content('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol>
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->render(),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol data-value="test-value">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol class="default-class">
            value
            </symbol>
            HTML,
            Symbol::tag(['class' => 'default-class'])->content('value')->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol class="default-class">
            value
            </symbol>
            HTML,
            Symbol::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Symbol::class, ['class' => 'default-class']);

        self::equalsWithoutLE(
            <<<HTML
            <symbol class="default-class">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Symbol::class, []);
    }

    public function testRenderWithHeight(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol height="10">
            value
            </symbol>
            HTML,
            Symbol::tag()->height(10)->content('value')->render(),
            "Failed asserting that element renders correctly with 'height' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol id="myDot">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->id('myDot')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol lang="es">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->lang(Language::SPANISH)->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol opacity="0.5">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->opacity('0.5')->render(),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithPreserveAspectRatio(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol preserveAspectRatio="xMidYMid meet">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->preserveAspectRatio('xMidYMid meet')->render(),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute.",
        );
    }

    public function testRenderWithPreserveAspectRatioUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol preserveAspectRatio="xMinYMin slice">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->preserveAspectRatio(PreserveAspectRatio::X_MIN_Y_MIN_SLICE)->render(),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute using enum.",
        );
    }

    public function testRenderWithRefX(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol refX="5">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->refX(5)->render(),
            "Failed asserting that element renders correctly with 'refX' attribute.",
        );
    }

    public function testRenderWithRefY(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol refY="2.5">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->refY(2.5)->render(),
            "Failed asserting that element renders correctly with 'refY' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol role="banner">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->role('banner')->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol role="banner">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->role(Role::BANNER)->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol style='test-value'>
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->style('test-value')->render(),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol tabindex="3">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->tabIndex(3)->render(),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol>
            value
            </symbol>
            HTML,
            (string) Symbol::tag()->content('value'),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol transform="rotate(45)">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->transform('rotate(45)')->render(),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Symbol::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <symbol class="from-global" id="id-user">
            value
            </symbol>
            HTML,
            Symbol::tag(['id' => 'id-user'])->content('value')->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Symbol::class, []);
    }

    public function testRenderWithViewBox(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol viewBox="0 0 2 2">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->viewBox('0 0 2 2')->render(),
            "Failed asserting that element renders correctly with 'viewBox' attribute.",
        );
    }

    public function testRenderWithWidth(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol width="10">
            value
            </symbol>
            HTML,
            Symbol::tag()->width(10)->content('value')->render(),
            "Failed asserting that element renders correctly with 'width' attribute.",
        );
    }

    public function testRenderWithX(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol x="10">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->x('10')->render(),
            "Failed asserting that element renders correctly with 'x' attribute.",
        );
    }

    public function testRenderWithY(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <symbol y="20">
            value
            </symbol>
            HTML,
            Symbol::tag()->content('value')->y('20')->render(),
            "Failed asserting that element renders correctly with 'y' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $symbol = Symbol::tag();

        self::assertNotSame(
            $symbol,
            $symbol->height(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $symbol,
            $symbol->opacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $symbol,
            $symbol->preserveAspectRatio(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $symbol,
            $symbol->refX(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $symbol,
            $symbol->refY(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $symbol,
            $symbol->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $symbol,
            $symbol->viewBox(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $symbol,
            $symbol->width(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $symbol,
            $symbol->x(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $symbol,
            $symbol->y(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingPreserveAspectRatioValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::PRESERVE_ASPECT_RATIO->value,
                implode("', '", Enum::normalizeArray(PreserveAspectRatio::cases())),
            ),
        );

        Symbol::tag()->preserveAspectRatio('invalid-value');
    }
}
