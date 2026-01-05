<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for SVG 2 `preserveAspectRatio` attribute.
 *
 * Provides a type-safe, standards-compliant set of preserve aspect ratio values for use in SVG element rendering,
 * attributes, and view helpers, ensuring technical consistency with SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring preserve aspect ratio assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of `preserveAspectRatio` values for semantic markup generation and accessibility.
 * - Values follow SVG 2 specification for `preserveAspectRatio`.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/preserveAspectRatio
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum PreserveAspectRatio: string
{
    /**
     * `none` - Does not force uniform scaling.
     *
     * Scale the graphic content of the given element non-uniformly if necessary such that the element's bounding box
     * exactly matches the viewport rectangle.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case NONE = 'none';

    /**
     * `xMaxYMax` - Align the `<min-x>+<width>` of the element's viewBox with the maximum X value of the viewport.
     *
     * Align the `<min-y>+<height>` of the element's viewBox with the maximum Y value of the viewport.
     *
     * Default meetOrSlice value is 'meet'.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MAX_Y_MAX = 'xMaxYMax';

    /**
     * `xMaxYMax meet` - Align the `<min-x>+<width>` of the element's viewBox with the maximum X value of the viewport.
     *
     * Align the `<min-y>+<height>` of the element's viewBox with the maximum Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewBox is visible within the viewport,
     * and the viewBox is scaled up as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MAX_Y_MAX_MEET = 'xMaxYMax meet';

    /**
     * `xMaxYMax slice` - Align the `<min-x>+<width>` of the element's viewBox with the maximum X value of the viewport.
     *
     * Align the `<min-y>+<height>` of the element's viewBox with the maximum Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewport is covered by the viewBox, and
     * the viewBox is scaled down as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MAX_Y_MAX_SLICE = 'xMaxYMax slice';

    /**
     * `xMaxYMid` - Align the `<min-x>+<width>` of the element's viewBox with the maximum X value of the viewport.
     *
     * Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     *
     * Default meetOrSlice value is 'meet'.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MAX_Y_MID = 'xMaxYMid';

    /**
     * `xMaxYMid meet` - Align the `<min-x>+<width>` of the element's viewBox with the maximum X value of the viewport.
     *
     * Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewBox is visible within the viewport,
     * and the viewBox is scaled up as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MAX_Y_MID_MEET = 'xMaxYMid meet';

    /**
     * `xMaxYMid slice` - Align the `<min-x>+<width>` of the element's viewBox with the maximum X value of the viewport.
     *
     * Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewport is covered by the viewBox, and
     * the viewBox is scaled down as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MAX_Y_MID_SLICE = 'xMaxYMid slice';

    /**
     * `xMaxYMin` - Align the `<min-x>+<width>` of the element's viewBox with the maximum X value of the viewport.
     *
     * Align the `<min-y>` of the element's viewBox with the smallest Y value of the viewport.
     *
     * Default meetOrSlice value is 'meet'.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MAX_Y_MIN = 'xMaxYMin';

    /**
     * `xMaxYMin meet` - Align the `<min-x>+<width>` of the element's viewBox with the maximum X value of the viewport.
     *
     * Align the `<min-y>` of the element's viewBox with the smallest Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewBox is visible within the viewport,
     * and the viewBox is scaled up as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MAX_Y_MIN_MEET = 'xMaxYMin meet';

    /**
     * `xMaxYMin slice` - Align the `<min-x>+<width>` of the element's viewBox with the maximum X value of the viewport.
     *
     * Align the `<min-y>` of the element's viewBox with the smallest Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewport is covered by the viewBox, and
     * the viewBox is scaled down as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MAX_Y_MIN_SLICE = 'xMaxYMin slice';

    /**
     * `xMidYMax` - Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport.
     *
     * Align the `<min-y>+<height>` of the element's viewBox with the maximum Y value of the viewport.
     *
     * Default meetOrSlice value is 'meet'.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MID_Y_MAX = 'xMidYMax';

    /**
     * `xMidYMax meet` - Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport.
     *
     * Align the `<min-y>+<height>` of the element's viewBox with the maximum Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewBox is visible within the viewport,
     * and the viewBox is scaled up as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MID_Y_MAX_MEET = 'xMidYMax meet';

    /**
     * `xMidYMax slice` - Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport.
     *
     * Align the `<min-y>+<height>` of the element's viewBox with the maximum Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewport is covered by the viewBox, and
     * the viewBox is scaled down as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MID_Y_MAX_SLICE = 'xMidYMax slice';

    /**
     * `xMidYMid` - Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport.
     *
     * Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     *
     * This is the default value.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MID_Y_MID = 'xMidYMid';

    /**
     * `xMidYMid meet` - Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport.
     *
     * Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewBox is visible within the viewport,
     * and the viewBox is scaled up as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MID_Y_MID_MEET = 'xMidYMid meet';

    /**
     * `xMidYMid slice` - Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport.
     *
     * Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewport is covered by the viewBox, and
     * the viewBox is scaled down as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MID_Y_MID_SLICE = 'xMidYMid slice';

    /**
     * `xMidYMin` - Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport.
     *
     * Align the `<min-y>` of the element's viewBox with the smallest Y value of the viewport.
     *
     * Default meetOrSlice value is 'meet'.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MID_Y_MIN = 'xMidYMin';

    /**
     * `xMidYMin meet` - Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport.
     *
     * Align the `<min-y>` of the element's viewBox with the smallest Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewBox is visible within the viewport,
     * and the viewBox is scaled up as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MID_Y_MIN_MEET = 'xMidYMin meet';

    /**
     * `xMidYMin slice` - Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport.
     *
     * Align the `<min-y>` of the element's viewBox with the smallest Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewport is covered by the viewBox, and
     * the viewBox is scaled down as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MID_Y_MIN_SLICE = 'xMidYMin slice';

    /**
     * `xMinYMax` - Align the `<min-x>` of the element's viewBox with the smallest X value of the viewport.
     *
     * Align the `<min-y>+<height>` of the element's viewBox with the maximum Y value of the viewport.
     *
     * Default meetOrSlice value is 'meet'.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MIN_Y_MAX = 'xMinYMax';

    /**
     * `xMinYMax meet` - Align the `<min-x>` of the element's viewBox with the smallest X value of the viewport.
     *
     * Align the `<min-y>+<height>` of the element's viewBox with the maximum Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewBox is visible within the viewport,
     * and the viewBox is scaled up as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MIN_Y_MAX_MEET = 'xMinYMax meet';

    /**
     * `xMinYMax slice` - Align the `<min-x>` of the element's viewBox with the smallest X value of the viewport.
     *
     * Align the `<min-y>+<height>` of the element's viewBox with the maximum Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewport is covered by the viewBox, and
     * the viewBox is scaled down as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MIN_Y_MAX_SLICE = 'xMinYMax slice';

    /**
     * `xMinYMid` - Align the `<min-x>` of the element's viewBox with the smallest X value of the viewport.
     *
     * Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     *
     * Default meetOrSlice value is 'meet'.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MIN_Y_MID = 'xMinYMid';

    /**
     * `xMinYMid meet` - Align the `<min-x>` of the element's viewBox with the smallest X value of the viewport.
     *
     * Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewBox is visible within the viewport,
     * and the viewBox is scaled up as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MIN_Y_MID_MEET = 'xMinYMid meet';

    /**
     * `xMinYMid slice` - Align the `<min-x>` of the element's viewBox with the smallest X value of the viewport.
     *
     * Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewport is covered by the viewBox, and
     * the viewBox is scaled down as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MIN_Y_MID_SLICE = 'xMinYMid slice';

    /**
     * `xMinYMin` - Align the `<min-x>` of the element's viewBox with the smallest X value of the viewport.
     *
     * Align the `<min-y>` of the element's viewBox with the smallest Y value of the viewport.
     *
     * Default meetOrSlice value is 'meet'.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MIN_Y_MIN = 'xMinYMin';

    /**
     * `xMinYMin meet` - Align the `<min-x>` of the element's viewBox with the smallest X value of the viewport.
     *
     * Align the `<min-y>` of the element's viewBox with the smallest Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewBox is visible within the viewport,
     * and the viewBox is scaled up as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MIN_Y_MIN_MEET = 'xMinYMin meet';

    /**
     * `xMinYMin slice` - Align the `<min-x>` of the element's viewBox with the smallest X value of the viewport.
     *
     * Align the `<min-y>` of the element's viewBox with the smallest Y value of the viewport.
     *
     * Scales the graphic such that the aspect ratio is preserved, the entire viewport is covered by the viewBox, and
     * the viewBox is scaled down as much as possible.
     *
     * @link https://svgwg.org/svg2-draft/coords.html#PreserveAspectRatioAttribute
     */
    case X_MIN_Y_MIN_SLICE = 'xMinYMin slice';
}
