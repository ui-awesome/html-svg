# Changelog

All notable changes to this project will be documented in this file.

The format is based on Keep a Changelog, and this project adheres to Semantic Versioning.

## 0.4.0 May 2, 2026

- refactor: prepare the 0.4.0 release with concrete SVG attribute APIs, dependency updates, docs, and tests.

## 0.3.2 January 28, 2026

- docs: add an automated refactoring section to the testing documentation.
- docs: update testing examples for running Composer scripts with arguments.
- docs: update command syntax in `development.md` and `testing.md` for clarity and consistency.
- chore: remove the redundant ignore rule in `actionlint.yml` and update the Rector command.

## 0.3.1 January 24, 2026

- chore: add `php-forge/coding-standard` to development dependencies for code quality checks.
- docs: remove references to `ecs.php` and `rector.php` from development documentation.

## 0.3.0 January 20, 2026

- refactor: improve codebase performance.
- feat: add the `SvgBlock` enum for SVG tag representation.
- feat: add base SVG tag classes and initial SVG element classes.
- feat: add SVG attribute APIs for paint, geometry, text, gradient, marker, mask, path, pattern, and stop attributes.
- feat: add SVG element classes including `Circle`, `ClipPath`, `Defs`, `Ellipse`, `Filter`, `ForeignObject`, `G`, `Image`, `Line`, `LinearGradient`, `Marker`, `Mask`, `Path`, `Pattern`, `Polygon`, `Polyline`, `RadialGradient`, `Rect`, `Stop`, `Svg`, `Symbol`, `Text`, and `Uses`.
- feat: add enum-backed value validation for supported SVG attribute values.
- feat: add `ui-awesome/html-mixin` integration for shared attribute and mixin behavior.
- fix: standardize SVG attribute validation, exception messages, and supported scalar value handling.
- fix: update SVG attribute and element documentation links to current specifications.
- fix: improve rendering tests for SVG elements and global attributes.
- refactor: rename SVG attribute constants from `SvgProperty` to `SvgAttribute`.
- refactor: standardize provider and test structures for SVG attribute coverage.
- docs: standardize PHPDoc headers and descriptions across SVG source, tests, and providers.
- docs: update `README.md`, testing documentation, and workflow documentation with SVG usage examples.
- chore: update configuration, memory limits, and development dependencies for release tooling.

## 0.2.0 March 31, 2024

- feat: add `ui-awesome/html-core` as the rendering foundation and remove direct `ui-awesome/html-helper` usage.

## 0.1.0 March 22, 2024

- feat: initial `ui-awesome/html-svg` package structure.
