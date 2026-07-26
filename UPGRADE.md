# Upgrade Guide

## 0.5.0

### `BaseSvgBlockTag` removed

`UIAwesome\Html\Svg\Base\BaseSvgBlockTag` was removed. It duplicated the begin/end stack, lifecycle hooks, and output
normalization already provided by `UIAwesome\Html\Core\Element\BaseBlock`. Every block-level SVG element
(`ClipPath`, `Defs`, `Filter`, `ForeignObject`, `G`, `LinearGradient`, `Marker`, `Mask`, `Pattern`, `RadialGradient`,
`Symbol`, and `Text`) now extends `BaseBlock` directly.

Before:

```php
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;

final class CustomBlockElement extends BaseSvgBlockTag {}
```

After:

```php
use UIAwesome\Html\Core\Element\BaseBlock;

final class CustomBlockElement extends BaseBlock {}
```

Rendered output is unchanged: `BaseBlock` collapses repeated line break groups through
`UIAwesome\Html\Helper\LineBreakNormalizer` instead of an inline `preg_replace()` call.

### `ContentInterface` on block-level SVG elements

Block-level SVG elements now implement `UIAwesome\Html\Contracts\Element\ContentInterface`, together with
`AttributesInterface` and `BlockInterface`, inherited from `BaseBlock`. Consumers can type-hint those contracts instead
of the concrete element classes.

`BaseBlock` also contributes the full core global attribute surface, so block-level SVG elements now expose
`accesskey()`, `contentEditable()`, `dir()`, `draggable()`, `hidden()`, `itemProp()`, `spellcheck()`, `title()`,
`translate()`, and related methods. Configuration keys that were previously ignored for these elements, such as
`title`, now resolve to a real method and are rendered.

### Global defaults and provider APIs replaced by `Config`

`SimpleFactory::setDefaults()`, `SimpleFactory::getDefaults()`, `BaseTag::addDefaultProvider()`, and
`BaseTag::addThemeProvider()` were removed from `ui-awesome/html-core`. Per-instance defaults are passed to `tag()`,
and application-scoped defaults and themes are applied with `config()`.

Before:

```php
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Svg\Defs;

SimpleFactory::setDefaults(Defs::class, ['class' => 'default-class']);

echo Defs::tag()->content('value')->render();

echo Defs::tag()->addDefaultProvider(SomeDefaultProvider::class)->content('value')->render();
```

After:

```php
use UIAwesome\Html\Core\Config\{Call, ComponentContext, Config, Cookbook, Recipe};
use UIAwesome\Html\Svg\Defs;

echo Defs::tag(['class' => 'default-class'])->content('value')->render();

$config = new Config(
    new SomeTheme('svg', new Recipe('svg.defs', new Cookbook(new Call('class', 'default-class')))),
);

echo Defs::tag()
    ->config($config, new ComponentContext('defs'))
    ->content('value')
    ->render();
```

Calls made after `config()` remain local overrides, because recipes are applied immediately.

## 0.4.0

### Removed SVG attribute traits

The `UIAwesome\Html\Svg\Attribute\*` traits were removed. SVG attribute methods now live directly on the concrete
element classes that support them.

Before:

```php
use UIAwesome\Html\Svg\Attribute\HasFill;

final class CustomElement
{
    use HasFill;
}
```

After:

```php
use UIAwesome\Html\Svg\Values\SvgAttribute;

public function fill(string|null $value): static
{
    return $this->addAttribute(SvgAttribute::FILL, $value);
}
```

If you extend package SVG elements such as `Svg`, `Circle`, `Path`, `Rect`, `Text`, or gradient elements, use the
attribute methods provided by those concrete classes. If you maintain custom SVG element classes, move any required
attribute methods into those classes and delegate to `addAttribute()` with the matching `SvgAttribute` case.

### Attribute values

- `Fetchpriority` was added for `Image::fetchpriority()`.
- `SvgAttribute` now includes shared cases such as `decoding`, `fetchpriority`, `height`, `href`, `title`, and `width`.

### Documentation

- `docs/development.md` was removed. Use `docs/testing.md` for local validation commands.
