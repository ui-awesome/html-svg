<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Helper\Enum;
use UIAwesome\Html\Helper\Exception\Message;
use UIAwesome\Html\Svg\LinearGradient;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Values\{CoordinateUnits, SpreadMethod, SvgAttribute};

/**
 * Test suite for {@see LinearGradient} element functionality and behavior.
 *
 * Validates the management and rendering of the SVG `<linearGradient>` element according to the SVG 2 specification.
 *
 * Ensures correct handling, immutability, and validation of the `LinearGradient` tag rendering, supporting all global
 * attributes and gradient-specific attributes.
 *
 * Test coverage.
 * - Accurate rendering of the `<linearGradient>` element with content.
 * - Correct application of coordinate attributes like `x1`, `y1`, `x2`, and `y2`.
 * - Correct application of gradient-specific attributes like `gradientUnits`, `gradientTransform`, and `spreadMethod`.
 * - Error handling for invalid attribute values.
 * - Immutability of the API, ensuring that setting attributes returns a new instance.
 *
 * {@see LinearGradient} for element implementation details.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('linearGradient')]
final class LinearGradientTest extends TestCase
{
    use TestSupport;

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient>
            Content
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->begin() . 'Content' . LinearGradient::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient class="gradient-style">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->class('gradient-style')->content('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithContent(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient>
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->render(),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithGradientTransform(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient gradientTransform="rotate(90)">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->gradientTransform('rotate(90)')->render(),
            "Failed asserting that element renders correctly with 'gradientTransform' attribute.",
        );
    }

    public function testRenderWithGradientUnits(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient gradientUnits="userSpaceOnUse">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->gradientUnits('userSpaceOnUse')->render(),
            "Failed asserting that element renders correctly with 'gradientUnits' attribute.",
        );
    }

    public function testRenderWithGradientUnitsUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient gradientUnits="objectBoundingBox">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->gradientUnits(CoordinateUnits::OBJECT_BOUNDING_BOX)->render(),
            "Failed asserting that element renders correctly with 'gradientUnits' attribute using enum.",
        );
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient id="gradient1">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->id('gradient1')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithMultipleAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient id="myGradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse" spreadMethod="pad">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()
                ->content('value')
                ->id('myGradient')
                ->x1('0%')
                ->y1('0%')
                ->x2('100%')
                ->y2('0%')
                ->gradientUnits('userSpaceOnUse')
                ->spreadMethod('pad')
                ->render(),
            'Failed asserting that element renders correctly with multiple attributes.',
        );
    }

    public function testRenderWithSpreadMethod(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient spreadMethod="reflect">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->spreadMethod('reflect')->render(),
            "Failed asserting that element renders correctly with 'spreadMethod' attribute.",
        );
    }

    public function testRenderWithSpreadMethodUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient spreadMethod="repeat">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->spreadMethod(SpreadMethod::REPEAT)->render(),
            "Failed asserting that element renders correctly with 'spreadMethod' attribute using enum.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient>
            value
            </linearGradient>
            HTML,
            (string) LinearGradient::tag()->content('value'),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithX1(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient x1="0">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->x1('0')->render(),
            "Failed asserting that element renders correctly with 'x1' attribute.",
        );
    }

    public function testRenderWithX2(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient x2="100%">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->x2('100%')->render(),
            "Failed asserting that element renders correctly with 'x2' attribute.",
        );
    }

    public function testRenderWithY1(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient y1="0">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->y1('0')->render(),
            "Failed asserting that element renders correctly with 'y1' attribute.",
        );
    }

    public function testRenderWithY2(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <linearGradient y2="100%">
            value
            </linearGradient>
            HTML,
            LinearGradient::tag()->content('value')->y2('100%')->render(),
            "Failed asserting that element renders correctly with 'y2' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $gradient = LinearGradient::tag();

        self::assertNotSame(
            $gradient,
            $gradient->gradientUnits('userSpaceOnUse'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->gradientTransform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->spreadMethod('pad'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->x1('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->y1('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->x2('100%'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $gradient,
            $gradient->y2('100%'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingGradientUnitsValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::GRADIENT_UNITS->value,
                implode('\', \'', Enum::normalizeArray(CoordinateUnits::cases())),
            ),
        );

        LinearGradient::tag()->gradientUnits('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingSpreadMethodValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                SvgAttribute::SPREAD_METHOD->value,
                implode('\', \'', Enum::normalizeArray(SpreadMethod::cases())),
            ),
        );

        LinearGradient::tag()->spreadMethod('invalid-value');
    }
}
