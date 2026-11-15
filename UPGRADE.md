# Upgrade Guide

## 0.7.0

### Tag configuration

`html-core` 0.9 rejects numeric keys and keys that match no method or property in `tag()` definitions, class
`loadDefault()` definitions, and `SimpleFactory::configure()`. These keys were previously ignored; they now raise
`UIAwesome\Html\Core\Exception\ConfigException`. Remove unknown keys or replace them with valid configuration keys:

```php
use UIAwesome\Html\Svg\Circle;

$circle = Circle::tag(['r' => 5]);
```

Applications that explicitly require `ui-awesome/html-core:^0.8` must also update that constraint to allow `^0.9`.

### Content method signatures

The inherited `content()` and `html()` methods accept `UnitEnum` as well as `string` and `Stringable`. Custom
`BaseSvg` subclasses that override these methods must accept the expanded parameter types, or PHP can reject the class
as incompatible. Keep existing method bodies and return types. For example:

```php
use UIAwesome\Html\Svg\Base\BaseSvg;

abstract class CustomSvg extends BaseSvg
{
    public function content(string|\Stringable|\UnitEnum ...$values): static
    {
        return parent::content(...$values);
    }

    public function html(string|\Stringable|\UnitEnum ...$values): static
    {
        return parent::html(...$values);
    }
}
```

SVG 0.6.1 already allowed `html-mixin` and `html-contracts` versions with these signatures, so this incompatibility
may already affect installations on 0.6.1. Version 0.7.0 requires versions that include both expanded signatures.

### SVG output

Empty SVG primitives now render as self-closing XML elements. For example, `Circle::tag()->r(5)->render()` changes
from `<circle r="5">` to `<circle r="5"/>`. Update exact string comparisons and snapshots accordingly. Boolean
attributes on these primitives now have explicit values, such as `hidden="hidden"`.

The `html-core` 0.9 block renderer no longer collapses consecutive line breaks in rendered output. For example,
`Text::tag()->content("a\n\nb")` preserves both line breaks. Update exact output comparisons if they relied on the
previous normalization.

SVG titles now preserve special characters as text: `title('A & B <b>')` renders encoded title content rather than
interpreting it as markup. Pass the original text and update output comparisons that relied on the earlier behavior.

### File loading and exception messages

`filePath()` stores the path; rendering or converting to a string loads and sanitizes the file and rejects non-SVG
input with `RuntimeException`. SVG 0.6.1 could already reject the same input when resolved with `svg-sanitize` 1.1.1;
with 1.0.0, the tested non-SVG input returned an empty string. Handle the exception around rendering or conversion rather
than relying on an empty result.

Some backed values in `UIAwesome\Html\Svg\Exception\Message` and the corresponding exception messages now use single
quotes instead of backticks. Update code that matches those exact strings or calls `Message::from()` with old values;
prefer exception types or enum cases where appropriate.

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
