<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Values\{Aria, Data, Language, Role};
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Svg\Defs;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;

/**
 * Unit tests for {@see Defs} element rendering, content, and attribute handling.
 *
 * Verifies rendered output, configuration precedence, and nested rendering behavior for {@see Defs::tag()}.
 *
 * Test coverage.
 * - Applies defaults via {@see SimpleFactory} and {@see DefaultProvider}, preserving user overrides.
 * - Renders `<defs>` with inline content.
 * - Renders `<defs>` with representative global HTML attributes.
 * - Supports nested rendering via `begin()` and `end()`.
 *
 * {@see Defs} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class DefsTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs aria-pressed="true">
            value
            </defs>
            HTML,
            Defs::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs aria-pressed="true">
            value
            </defs>
            HTML,
            Defs::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs data-value="value">
            value
            </defs>
            HTML,
            Defs::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs data-value="value">
            value
            </defs>
            HTML,
            Defs::tag()->addDataAttribute(Data::VALUE, 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </defs>
            HTML,
            Defs::tag()
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
            <defs class="value">
            value
            </defs>
            HTML,
            Defs::tag()->attributes(['class' => 'value'])->content('value')->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs>
            Content
            </defs>
            HTML,
            Defs::tag()->begin() . 'Content' . Defs::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs class="value">
            value
            </defs>
            HTML,
            Defs::tag()->class('value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs>
            value
            </defs>
            HTML,
            Defs::tag()->content('value')->render(),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs data-value="test-value">
            value
            </defs>
            HTML,
            Defs::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs class="default-class">
            value
            </defs>
            HTML,
            Defs::tag(['class' => 'default-class'])->content('value')->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs class="default-class">
            value
            </defs>
            HTML,
            Defs::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Defs::class, ['class' => 'default-class']);

        self::equalsWithoutLE(
            <<<HTML
            <defs class="default-class">
            value
            </defs>
            HTML,
            Defs::tag()->content('value')->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Defs::class, []);
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs id="test-id">
            value
            </defs>
            HTML,
            Defs::tag()->content('value')->id('test-id')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs lang="es">
            value
            </defs>
            HTML,
            Defs::tag()->content('value')->lang(Language::SPANISH)->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs role="banner">
            value
            </defs>
            HTML,
            Defs::tag()->content('value')->role('banner')->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs role="banner">
            value
            </defs>
            HTML,
            Defs::tag()->content('value')->role(Role::BANNER)->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs style='test-value'>
            value
            </defs>
            HTML,
            Defs::tag()->content('value')->style('test-value')->render(),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs tabindex="3">
            value
            </defs>
            HTML,
            Defs::tag()->content('value')->tabIndex(3)->render(),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <defs>
            value
            </defs>
            HTML,
            (string) Defs::tag()->content('value'),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Defs::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <defs class="from-global" id="id-user">
            value
            </defs>
            HTML,
            Defs::tag(['id' => 'id-user'])->content('value')->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Defs::class, []);
    }
}
