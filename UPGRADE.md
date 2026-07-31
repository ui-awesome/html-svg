# Upgrade Guide

## 0.5.0

### SVG block base class

`UIAwesome\Html\Svg\Base\BaseSvgBlockTag` was removed. Custom block-level SVG elements must extend
`UIAwesome\Html\Core\Element\BaseBlock`:

```php
final class CustomBlockElement extends BaseBlock
{
}
```

Block-level SVG elements now inherit `ContentInterface`, `AttributesInterface`, `BlockInterface`, and the core global
attribute methods from `BaseBlock`.

### Scoped configuration

Global defaults and provider methods were removed from the core package. Pass per-instance defaults to `tag()`:

```php
echo Defs::tag(['class' => 'default-class'])
    ->content('value')
    ->render();
```

Apply application configuration before fluent setters that must remain local overrides:

```php
echo Defs::tag()
    ->config($config, new ComponentContext('defs'))
    ->class('local-class')
    ->render();
```

## 0.4.0

### SVG attribute traits

Traits under `UIAwesome\Html\Svg\Attribute\*` were removed. Package elements expose their supported attribute methods
directly. Custom SVG elements must define the required setters and delegate to `addAttribute()` with the corresponding
`SvgAttribute` case.

```php
public function fill(string|null $value): static
{
    return $this->addAttribute(SvgAttribute::FILL, $value);
}
```
