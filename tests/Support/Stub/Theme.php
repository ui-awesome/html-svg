<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Stub;

use UIAwesome\Html\Core\Config\{ComponentContext, Recipe};
use UIAwesome\Html\Core\Theme\ThemeInterface;

use function array_values;

/**
 * Stub theme for application-scoped config tests.
 *
 * Yields the recipes received at construction time for every component context.
 */
final readonly class Theme implements ThemeInterface
{
    /**
     * Ordered theme recipes.
     *
     * @var list<Recipe>
     */
    private array $recipes;

    public function __construct(private string $name, Recipe ...$recipes)
    {
        $this->recipes = array_values($recipes);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRecipes(ComponentContext $context): iterable
    {
        yield from $this->recipes;
    }
}
