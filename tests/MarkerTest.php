<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Svg\Marker;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Values\{MarkerUnits, Orient, PreserveAspectRatio, SvgAttribute};

/**
 * Test suite for {@see Marker} element functionality and behavior.
 *
 * Validates the management and rendering of the SVG `<marker>` element according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `Marker` tag rendering, supporting all global
 * attributes, content, and marker-specific attributes.
 *
 * Test coverage.
 * - Accurate rendering of the `<marker>` element with inline content.
 * - Correct application of marker-specific attributes like `markerWidth`, `markerHeight`, `markerUnits`, `orient`,
 *   `refX`, `refY`, `viewBox`, and `preserveAspectRatio`.
 * - Correct application of presentation attributes like `opacity` and `transform`.
 * - Error handling for invalid attribute values.
 * - Immutability of the API, ensuring that setting attributes returns a new instance.
 *
 * {@see Marker} for element implementation details.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class MarkerTest extends TestCase
{
    use TestSupport;

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker>
            Content
            </marker>
            HTML,
            Marker::tag()->content('value')->begin() . 'Content' . Marker::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker class="arrow-marker">
            value
            </marker>
            HTML,
            Marker::tag()->class('arrow-marker')->content('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker>
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->render(),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker id="arrowhead">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->id('arrowhead')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithMarkerHeight(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker markerHeight="6">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->markerHeight(6)->render(),
            "Failed asserting that element renders correctly with 'markerHeight' attribute.",
        );
    }

    public function testRenderWithMarkerUnits(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker markerUnits="userSpaceOnUse">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->markerUnits('userSpaceOnUse')->render(),
            "Failed asserting that element renders correctly with 'markerUnits' attribute.",
        );
    }

    public function testRenderWithMarkerUnitsUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker markerUnits="strokeWidth">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->markerUnits(MarkerUnits::STROKE_WIDTH)->render(),
            "Failed asserting that element renders correctly with 'markerUnits' attribute using enum.",
        );
    }

    public function testRenderWithMarkerWidth(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker markerWidth="6">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->markerWidth(6)->render(),
            "Failed asserting that element renders correctly with 'markerWidth' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker opacity="0.5">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->opacity(0.5)->render(),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithOrient(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker orient="45">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->orient(45)->render(),
            "Failed asserting that element renders correctly with 'orient' attribute using angle.",
        );
    }

    public function testRenderWithOrientUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker orient="auto-start-reverse">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->orient(Orient::AUTO_START_REVERSE)->render(),
            "Failed asserting that element renders correctly with 'orient' attribute using enum.",
        );
    }

    public function testRenderWithPreserveAspectRatio(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker preserveAspectRatio="xMidYMid meet">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->preserveAspectRatio('xMidYMid meet')->render(),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute.",
        );
    }

    public function testRenderWithPreserveAspectRatioUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker preserveAspectRatio="none">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->preserveAspectRatio(PreserveAspectRatio::NONE)->render(),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute using enum.",
        );
    }

    public function testRenderWithRefX(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker refX="5">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->refX(5)->render(),
            "Failed asserting that element renders correctly with 'refX' attribute.",
        );
    }

    public function testRenderWithRefY(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker refY="2.5">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->refY(2.5)->render(),
            "Failed asserting that element renders correctly with 'refY' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker>
            value
            </marker>
            HTML,
            (string) Marker::tag()->content('value'),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker transform="scale(2)">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->transform('scale(2)')->render(),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithViewBox(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <marker viewBox="0 0 10 10">
            value
            </marker>
            HTML,
            Marker::tag()->content('value')->viewBox('0 0 10 10')->render(),
            "Failed asserting that element renders correctly with 'viewBox' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $marker = Marker::tag();

        self::assertNotSame(
            $marker,
            $marker->markerHeight(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $marker,
            $marker->markerUnits(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $marker,
            $marker->markerWidth(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $marker,
            $marker->opacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $marker,
            $marker->orient(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $marker,
            $marker->preserveAspectRatio(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $marker,
            $marker->refX(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $marker,
            $marker->refY(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $marker,
            $marker->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $marker,
            $marker->viewBox(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingMarkerUnitsValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::MARKER_UNITS->value,
                implode('\', \'', Enum::normalizeArray(MarkerUnits::cases())),
            ),
        );

        Marker::tag()->markerUnits('invalid-value');
    }
}
