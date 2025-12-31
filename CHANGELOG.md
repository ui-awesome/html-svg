# ChangeLog

## 0.3.0 Under development

- Enh #5: Refactor codebase to improve performance (@terabytesoftw)
- Enh #6: Add `SvgBlock` enum for HTML SVG tag representation and implement `BlockInterface` class (@terabytesoftw)
- Enh #7: Add `BaseSvgTag` and `Defs` classes for SVG block-level elements and related tests (@terabytesoftw)
- Enh #8: Add `HasFill` trait and corresponding tests for managing SVG `fill` attribute (@terabytesoftw)
- Bug #9: Correct SVG specification reference in `HasFill` trait documentation (@terabytesoftw)
- Enh #10: Add `HasStroke` trait and corresponding tests for managing SVG `stroke` attribute (@terabytesoftw)
- Bug #11: Update documentation to specify SVG 2 specification for `HasFillTest` class (@terabytesoftw)
- Bug #12: Clarify fill and stroke attribute documentation for SVG 2 compliance (@terabytesoftw)
- Enh #13: Add `HasStrokeLineCap` trait and corresponding tests for managing SVG `stroke-linecap` attribute (@terabytesoftw)
- Enh #14: Add `HasStrokeLineJoin` trait and corresponding tests for managing SVG `stroke-linejoin` attribute (@terabytesoftw)
- Enh #15: Add `HasStrokeWidth` trait and corresponding tests for managing SVG `stroke-width` attribute (@terabytesoftw)
- Bug #16: Update links and references to SVG 2 specification across multiple attributes and tests (@terabytesoftw)
- Bug #17: Add references to predefined enum values in `HasStrokeLineCap` and `HasStrokeLineJoin` traits (@terabytesoftw)
- Bug #18: Update assertion message for integer setting in `StrokeWidthProvider` class (@terabytesoftw)
- Enh #19: Add `HasStrokeDashArray` trait and corresponding tests for managing SVG `stroke-dasharray` attribute (@terabytesoftw)
- Bug #20: Update `HasStrokeDashArray` trait and tests to support float values for `stroke-dasharray` attribute (@terabytesoftw)
- Enh #21: Add `HasOpacity` trait and corresponding tests for managing SVG `opacity` attribute (@terabytesoftw)
- Bug #22: Add float type support to `stroke-dasharray` attribute and update documentation (@terabytesoftw)
- Enh #23: Add `HasTransform` trait and corresponding tests for managing SVG `transform` attribute (@terabytesoftw)
- Enh #24: Add `G` class and corresponding tests for SVG `<g>` element functionality (@terabytesoftw)

## 0.2.0 March 31, 2024

- Enh #2: Add `ui-awesome/html-core` package and remove `ui-awesome/html-helper` package (@terabytesoftw)

## 0.1.0 March 22, 2024

- Enh #1: Initial release (@terabytesoftw)
