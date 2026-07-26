<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Provider;

use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Tag\{SvgBlock, SvgVoid};
use UIAwesome\Html\Svg\Values\{
    CoordinateUnits,
    Decoding,
    DominantBaseline,
    Fetchpriority,
    FillRule,
    FontStyle,
    LengthAdjust,
    MarkerUnits,
    MaskType,
    Orient,
    PreserveAspectRatio,
    SpreadMethod,
    StrokeLineCap,
    StrokeLineJoin,
    SvgAttribute,
    TextAnchor,
    TextDecorationLine,
    TextDecorationStyle,
    WritingMode,
};

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\EnumContractTest} test cases.
 *
 * Freezes the public case name and backed value of every enum exposed by the package.
 */
final class EnumContractProvider
{
    /**
     * @return array<string, array{class-string, array<string, string>}>
     */
    public static function contracts(): array
    {
        return [
            'coordinate units' => [CoordinateUnits::class, self::coordinateUnits()],
            'decoding' => [Decoding::class, self::decoding()],
            'dominant baseline' => [DominantBaseline::class, self::dominantBaseline()],
            'fetchpriority' => [Fetchpriority::class, self::fetchpriority()],
            'fill rule' => [FillRule::class, self::fillRule()],
            'font style' => [FontStyle::class, self::fontStyle()],
            'length adjust' => [LengthAdjust::class, self::lengthAdjust()],
            'marker units' => [MarkerUnits::class, self::markerUnits()],
            'mask type' => [MaskType::class, self::maskType()],
            'orient' => [Orient::class, self::orient()],
            'preserve aspect ratio' => [PreserveAspectRatio::class, self::preserveAspectRatio()],
            'spread method' => [SpreadMethod::class, self::spreadMethod()],
            'stroke line cap' => [StrokeLineCap::class, self::strokeLineCap()],
            'stroke line join' => [StrokeLineJoin::class, self::strokeLineJoin()],
            'svg attribute' => [SvgAttribute::class, self::svgAttribute()],
            'svg block' => [SvgBlock::class, self::svgBlock()],
            'svg void' => [SvgVoid::class, self::svgVoid()],
            'text anchor' => [TextAnchor::class, self::textAnchor()],
            'text decoration line' => [TextDecorationLine::class, self::textDecorationLine()],
            'text decoration style' => [TextDecorationStyle::class, self::textDecorationStyle()],
            'writing mode' => [WritingMode::class, self::writingMode()],
            'message' => [Message::class, self::message()],
        ];
    }

    /**
     * @return array<string, array{class-string, string}>
     */
    public static function invalidValues(): array
    {
        $values = [];

        foreach (self::contracts() as $key => [$enum]) {
            $values[$key] = [$enum, '__not-a-valid-backed-value__'];
        }

        return $values;
    }

    /**
     * @return array<string, array{class-string, string, string}>
     */
    public static function validValues(): array
    {
        $values = [];

        foreach (self::contracts() as [$enum, $cases]) {
            foreach ($cases as $name => $value) {
                $values["{$enum}::{$name}"] = [$enum, $name, $value];
            }
        }

        return $values;
    }

    /**
     * @return array<string, string>
     */
    private static function coordinateUnits(): array
    {
        return [
            'OBJECT_BOUNDING_BOX' => 'objectBoundingBox',
            'USER_SPACE_ON_USE' => 'userSpaceOnUse',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function decoding(): array
    {
        return [
            'ASYNC' => 'async',
            'AUTO' => 'auto',
            'SYNC' => 'sync',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function dominantBaseline(): array
    {
        return [
            'ALPHABETIC' => 'alphabetic',
            'AUTO' => 'auto',
            'CENTRAL' => 'central',
            'HANGING' => 'hanging',
            'IDEOGRAPHIC' => 'ideographic',
            'MATHEMATICAL' => 'mathematical',
            'MIDDLE' => 'middle',
            'TEXT_BOTTOM' => 'text-bottom',
            'TEXT_TOP' => 'text-top',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function fetchpriority(): array
    {
        return [
            'AUTO' => 'auto',
            'HIGH' => 'high',
            'LOW' => 'low',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function fillRule(): array
    {
        return [
            'EVENODD' => 'evenodd',
            'NONZERO' => 'nonzero',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function fontStyle(): array
    {
        return [
            'ITALIC' => 'italic',
            'NORMAL' => 'normal',
            'OBLIQUE' => 'oblique',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function lengthAdjust(): array
    {
        return [
            'SPACING' => 'spacing',
            'SPACING_AND_GLYPHS' => 'spacingAndGlyphs',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function markerUnits(): array
    {
        return [
            'STROKE_WIDTH' => 'strokeWidth',
            'USER_SPACE_ON_USE' => 'userSpaceOnUse',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function maskType(): array
    {
        return [
            'ALPHA' => 'alpha',
            'LUMINANCE' => 'luminance',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function message(): array
    {
        return [
            'CONTENT_AND_FILEPATH_CANNOT_BE_BOTH_EMPTY'
                => 'File path and content cannot be empty at the same time for SVG.',
            'FAILED_TO_READ_FILE' => "Failed to read file: '%s'.",
            'FAILED_TO_SANITIZE_SVG' => "Failed to sanitize SVG content from file: '%s'.",
            'ICON_REFERENCE_FILE_NOT_FOUND' => "Icon reference '%s' does not resolve to a bundled SVG file.",
            'ICON_REFERENCE_MUST_BE_COLLECTION_NAME' => "Icon reference '%s' must be in the form 'Collection:name'.",
            'TITLE_ATTRIBUTE_MUST_BE_STRING_OR_NULL' => 'Title attribute must be a `string` or `null`.',
            'VALUE_MUST_BE_GTE_ONE_OR_NULL' => 'Value must be a number greater than or equal to `1` or `null` to unset.',
            'VALUE_MUST_BE_POSITIVE_NUMBER_OR_NULL' => 'Value must be a positive number or `null` to unset.',
            'VALUE_OUT_OF_RANGE_OR_NULL'
                => "Value must be a number between '%s' and '%s' inclusive or `null` to unset.",
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function orient(): array
    {
        return [
            'AUTO' => 'auto',
            'AUTO_START_REVERSE' => 'auto-start-reverse',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function preserveAspectRatio(): array
    {
        return [
            'NONE' => 'none',
            'X_MAX_Y_MAX' => 'xMaxYMax',
            'X_MAX_Y_MAX_MEET' => 'xMaxYMax meet',
            'X_MAX_Y_MAX_SLICE' => 'xMaxYMax slice',
            'X_MAX_Y_MID' => 'xMaxYMid',
            'X_MAX_Y_MID_MEET' => 'xMaxYMid meet',
            'X_MAX_Y_MID_SLICE' => 'xMaxYMid slice',
            'X_MAX_Y_MIN' => 'xMaxYMin',
            'X_MAX_Y_MIN_MEET' => 'xMaxYMin meet',
            'X_MAX_Y_MIN_SLICE' => 'xMaxYMin slice',
            'X_MID_Y_MAX' => 'xMidYMax',
            'X_MID_Y_MAX_MEET' => 'xMidYMax meet',
            'X_MID_Y_MAX_SLICE' => 'xMidYMax slice',
            'X_MID_Y_MID' => 'xMidYMid',
            'X_MID_Y_MID_MEET' => 'xMidYMid meet',
            'X_MID_Y_MID_SLICE' => 'xMidYMid slice',
            'X_MID_Y_MIN' => 'xMidYMin',
            'X_MID_Y_MIN_MEET' => 'xMidYMin meet',
            'X_MID_Y_MIN_SLICE' => 'xMidYMin slice',
            'X_MIN_Y_MAX' => 'xMinYMax',
            'X_MIN_Y_MAX_MEET' => 'xMinYMax meet',
            'X_MIN_Y_MAX_SLICE' => 'xMinYMax slice',
            'X_MIN_Y_MID' => 'xMinYMid',
            'X_MIN_Y_MID_MEET' => 'xMinYMid meet',
            'X_MIN_Y_MID_SLICE' => 'xMinYMid slice',
            'X_MIN_Y_MIN' => 'xMinYMin',
            'X_MIN_Y_MIN_MEET' => 'xMinYMin meet',
            'X_MIN_Y_MIN_SLICE' => 'xMinYMin slice',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function spreadMethod(): array
    {
        return [
            'PAD' => 'pad',
            'REFLECT' => 'reflect',
            'REPEAT' => 'repeat',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function strokeLineCap(): array
    {
        return [
            'BUTT' => 'butt',
            'ROUND' => 'round',
            'SQUARE' => 'square',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function strokeLineJoin(): array
    {
        return [
            'ARCS' => 'arcs',
            'BEVEL' => 'bevel',
            'MITER' => 'miter',
            'MITER_CLIP' => 'miter-clip',
            'ROUND' => 'round',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function svgAttribute(): array
    {
        return [
            'CLIP_PATH_UNITS' => 'clipPathUnits',
            'CX' => 'cx',
            'CY' => 'cy',
            'D' => 'd',
            'DECODING' => 'decoding',
            'DOMINANT_BASELINE' => 'dominant-baseline',
            'DX' => 'dx',
            'DY' => 'dy',
            'FETCHPRIORITY' => 'fetchpriority',
            'FILL' => 'fill',
            'FILL_OPACITY' => 'fill-opacity',
            'FILL_RULE' => 'fill-rule',
            'FILTER_UNITS' => 'filterUnits',
            'FONT_FAMILY' => 'font-family',
            'FONT_SIZE' => 'font-size',
            'FONT_STYLE' => 'font-style',
            'FONT_WEIGHT' => 'font-weight',
            'FR' => 'fr',
            'FX' => 'fx',
            'FY' => 'fy',
            'GRADIENT_TRANSFORM' => 'gradientTransform',
            'GRADIENT_UNITS' => 'gradientUnits',
            'HEIGHT' => 'height',
            'HREF' => 'href',
            'LENGTH_ADJUST' => 'lengthAdjust',
            'LETTER_SPACING' => 'letter-spacing',
            'MARKER_HEIGHT' => 'markerHeight',
            'MARKER_UNITS' => 'markerUnits',
            'MARKER_WIDTH' => 'markerWidth',
            'MASK_CONTENT_UNITS' => 'maskContentUnits',
            'MASK_TYPE' => 'mask-type',
            'MASK_UNITS' => 'maskUnits',
            'OFFSET' => 'offset',
            'OPACITY' => 'opacity',
            'ORIENT' => 'orient',
            'PATH_LENGTH' => 'pathLength',
            'PATTERN_CONTENT_UNITS' => 'patternContentUnits',
            'PATTERN_TRANSFORM' => 'patternTransform',
            'PATTERN_UNITS' => 'patternUnits',
            'POINTS' => 'points',
            'PRESERVE_ASPECT_RATIO' => 'preserveAspectRatio',
            'PRIMITIVE_UNITS' => 'primitiveUnits',
            'R' => 'r',
            'REF_X' => 'refX',
            'REF_Y' => 'refY',
            'ROTATE' => 'rotate',
            'RX' => 'rx',
            'RY' => 'ry',
            'SPREAD_METHOD' => 'spreadMethod',
            'STOP_COLOR' => 'stop-color',
            'STOP_OPACITY' => 'stop-opacity',
            'STROKE' => 'stroke',
            'STROKE_DASHARRAY' => 'stroke-dasharray',
            'STROKE_LINECAP' => 'stroke-linecap',
            'STROKE_LINEJOIN' => 'stroke-linejoin',
            'STROKE_MITERLIMIT' => 'stroke-miterlimit',
            'STROKE_OPACITY' => 'stroke-opacity',
            'STROKE_WIDTH' => 'stroke-width',
            'TEXT_ANCHOR' => 'text-anchor',
            'TEXT_DECORATION' => 'text-decoration',
            'TEXT_LENGTH' => 'textLength',
            'TITLE' => 'title',
            'TRANSFORM' => 'transform',
            'VIEW_BOX' => 'viewBox',
            'WIDTH' => 'width',
            'WORD_SPACING' => 'word-spacing',
            'WRITING_MODE' => 'writing-mode',
            'X' => 'x',
            'X1' => 'x1',
            'X2' => 'x2',
            'XMLNS' => 'xmlns',
            'Y' => 'y',
            'Y1' => 'y1',
            'Y2' => 'y2',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function svgBlock(): array
    {
        return [
            'CLIP_PATH' => 'clipPath',
            'DEFS' => 'defs',
            'FILTER' => 'filter',
            'FOREIGN_OBJECT' => 'foreignObject',
            'G' => 'g',
            'LINEAR_GRADIENT' => 'linearGradient',
            'MARKER' => 'marker',
            'MASK' => 'mask',
            'PATTERN' => 'pattern',
            'RADIAL_GRADIENT' => 'radialGradient',
            'SVG' => 'svg',
            'SYMBOL' => 'symbol',
            'TEXT' => 'text',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function svgVoid(): array
    {
        return [
            'CIRCLE' => 'circle',
            'ELLIPSE' => 'ellipse',
            'IMAGE' => 'image',
            'LINE' => 'line',
            'PATH' => 'path',
            'POLYGON' => 'polygon',
            'POLYLINE' => 'polyline',
            'RECT' => 'rect',
            'STOP' => 'stop',
            'USES' => 'use',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function textAnchor(): array
    {
        return [
            'END' => 'end',
            'MIDDLE' => 'middle',
            'START' => 'start',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function textDecorationLine(): array
    {
        return [
            'BLINK' => 'blink',
            'GRAMMAR_ERROR' => 'grammar-error',
            'LINE_THROUGH' => 'line-through',
            'NONE' => 'none',
            'OVERLINE' => 'overline',
            'SPELLING_ERROR' => 'spelling-error',
            'UNDERLINE' => 'underline',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function textDecorationStyle(): array
    {
        return [
            'DASHED' => 'dashed',
            'DOTTED' => 'dotted',
            'DOUBLE' => 'double',
            'SOLID' => 'solid',
            'WAVY' => 'wavy',
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function writingMode(): array
    {
        return [
            'HORIZONTAL_TB' => 'horizontal-tb',
            'SIDEWAYS_LR' => 'sideways-lr',
            'SIDEWAYS_RL' => 'sideways-rl',
            'VERTICAL_LR' => 'vertical-lr',
            'VERTICAL_RL' => 'vertical-rl',
        ];
    }
}
