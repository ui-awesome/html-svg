---
name: ui-awesome-html-svg
description: Compose immutable SVG markup, load sanitized SVG files and resolve bundled icons with ui-awesome/html-svg in PHP applications. Use when generating or testing SVG output with this package; do not use for raster images, CSS or JavaScript icon libraries, frontend asset pipelines or unrelated Yii widgets.
license: BSD-3-Clause
---

# Work with SVG composition and file loading

## Resolve the actual package

Inspect the installed package path, reference and PHP constraint before choosing an API. Compare Composer installed
metadata, the lockfile and actual source; modified/path repositories may differ from a published revision. A skill
installation does not install runtime dependencies.

Start with `src/Base/BaseSvg.php`, `src/Svg.php` and only the related source, tests and guide needed for the task.
Guides may be excluded from Composer archives: use the installed source or matching-revision repository documentation,
not an assumed latest API. Do not use this package as a substitute for unrelated Yii widgets, database models or
frontend asset management.

## Package-specific workflow

- Compose `Svg` with typed children such as `Path`, `Circle`, `Defs` and gradients. Inspect each setter and enum before
  using coordinates or style values.
- For `filePath()` inspect `BaseSvg` loading, DOM parsing and the installed svg-sanitize dependency. Use authorized
  local files only. Do not treat arbitrary paths, external resources or sanitizer success as blanket trust.
- For bundled icons use `Svg::icon('Collection:name')` to render and `Svg::iconPath('Collection:name')` when another
  component needs only the file path. Inspect `assets/icons/` for the available collections and names.
- Keep text titles encoded and preserve accessibility attributes. Direct trusted `html()` composition is different from
  sanitized file loading; do not claim all raw children are sanitized.
- Test a valid SVG, malformed/non-SVG input and title text containing markup. Verify viewBox/size/namespace and loaded
  attribute precedence at the current revision. Browser layout and external assets require separate visual checks.

## Intended contracts

These behaviors are deliberate; do not "fix" them:

- Setters return a new instance; the original object is unchanged.
- `title()` renders an encoded `<title>` child element, inserted first in loaded files, never a `title` attribute.
- Attributes configured on the instance replace the same attributes of a file loaded through `filePath()`.
- `html()` children are rendered as given and are not sanitized; only `filePath()` content passes the sanitizer.
- Empty SVG primitives such as `<circle r="5"/>` render as self-closing XML elements.
- Rendering `Svg` without content and without `filePath()` throws `InvalidArgumentException`; an unreadable file or
  content the sanitizer rejects, including non-SVG input, throws `RuntimeException`.
- Icon references must match `Collection:name` with `[A-Za-z0-9_-]+` segments; other formats, path separators, `..` and
  missing icons throw `InvalidArgumentException`.
- Opacity values outside `0`–`1` throw `InvalidArgumentException` instead of being clamped.

## Verify the result

Execute focused examples against the inspected package and its actual dependencies. Assert normal, boundary and negative
cases with explicit failures; do not rely on disabled PHP assertions. Preserve supported PHP versions and report missing
runtime/tooling rather than changing constraints to manufacture a pass. Report browser rendering as unchecked unless it
was exercised. Do not install dependencies or modify unrelated files without an authorized task.
