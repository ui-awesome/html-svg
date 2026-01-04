<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Values;

/**
 * Represents standardized values for SVG 2 `clipPathUnits` attribute.
 *
 * Provides a type-safe, standards-compliant set of clip path units values for use in SVG element rendering, attributes,
 * and view helpers, ensuring technical consistency with SVG 2 specification and modern web standards.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring clip path units assignment.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of clip path units values for semantic markup generation and accessibility.
 * - Values follow SVG 2 specification for clipPathUnits: `objectBoundingBox` and `userSpaceOnUse`.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/clipPathUnits
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum ClipPathUnits: string
{
    /**
     * `objectBoundingBox` - Coordinate system for the contents of the `<clipPath>` is established by the bounding box
     * of the element to which the clipping path is applied.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/clipPathUnits
     */
    case OBJECT_BOUNDING_BOX = 'objectBoundingBox';

    /**
     * `userSpaceOnUse` - Coordinate system for the contents of the `<clipPath>` is established by the current user
     * coordinate system in place at the time when the `<clipPath>` is referenced.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/clipPathUnits
     */
    case USER_SPACE_ON_USE = 'userSpaceOnUse';
}
