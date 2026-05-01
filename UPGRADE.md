# Upgrade Guide

## 0.4.0

### PHP and package requirements

- The minimum PHP version is now `^8.3`.
- Runtime dependencies were updated to the current UI Awesome package line:
  - `ui-awesome/html-attribute:^0.6`
  - `ui-awesome/html-contracts:^0.1`
  - `ui-awesome/html-core:^0.6`
  - `ui-awesome/html-helper:^0.7`
  - `ui-awesome/html-interop:^0.4`
  - `ui-awesome/html-mixin:^0.6`

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
