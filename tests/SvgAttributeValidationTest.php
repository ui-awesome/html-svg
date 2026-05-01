<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use BackedEnum;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{DataProvider, Group};
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use UIAwesome\Html\Core\Base\BaseTag;
use UIAwesome\Html\Helper\Exception\Message as HelperMessage;
use UIAwesome\Html\Svg\{
    Circle,
    ClipPath,
    Ellipse,
    ForeignObject,
    G,
    Image,
    Line,
    LinearGradient,
    Marker,
    Path,
    Pattern,
    Polygon,
    Polyline,
    RadialGradient,
    Rect,
    Svg,
    Symbol,
    Text,
    Uses,
};
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Values\{
    CoordinateUnits,
    FillRule,
    PreserveAspectRatio,
    SpreadMethod,
    StrokeLineCap,
    StrokeLineJoin,
    SvgAttribute,
};
use UnitEnum;

/**
 * Unit tests for SVG fluent attribute validation boundaries.
 *
 * Verifies exception behavior migrated from the removed SVG attribute trait tests against concrete SVG elements.
 *
 * Test coverage.
 * - Rejects opacity-like values greater than `1`.
 * - Rejects `stroke-miterlimit` values below `1` and accepts the lower boundary.
 * - Rejects invalid path length values.
 * - Rejects invalid enum-backed SVG attribute values.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class SvgAttributeValidationTest extends TestCase
{
    /**
     * @return array<string, array{0: class-string<BaseTag>, 1: non-empty-string, 2: SvgAttribute, 3: list<UnitEnum>}>
     */
    public static function enumBackedAttributeMethods(): array
    {
        $data = [];

        foreach (self::paintClasses() as $className) {
            self::addEnumCase($data, $className, 'fillRule', SvgAttribute::FILL_RULE, FillRule::cases());
            self::addEnumCase(
                $data,
                $className,
                'strokeLineCap',
                SvgAttribute::STROKE_LINECAP,
                StrokeLineCap::cases(),
            );
            self::addEnumCase(
                $data,
                $className,
                'strokeLineJoin',
                SvgAttribute::STROKE_LINEJOIN,
                StrokeLineJoin::cases(),
            );
        }

        foreach ([Svg::class, Image::class, Marker::class, Pattern::class, Symbol::class] as $className) {
            self::addEnumCase(
                $data,
                $className,
                'preserveAspectRatio',
                SvgAttribute::PRESERVE_ASPECT_RATIO,
                PreserveAspectRatio::cases(),
            );
        }

        foreach ([LinearGradient::class, RadialGradient::class] as $className) {
            self::addEnumCase(
                $data,
                $className,
                'gradientUnits',
                SvgAttribute::GRADIENT_UNITS,
                CoordinateUnits::cases(),
            );
            self::addEnumCase($data, $className, 'spreadMethod', SvgAttribute::SPREAD_METHOD, SpreadMethod::cases());
        }

        return $data;
    }

    /**
     * @return array<string, array{0: class-string<BaseTag>, 1: non-empty-string}>
     */
    public static function opacityLikeAttributeMethods(): array
    {
        $data = [];

        foreach (self::paintClasses() as $className) {
            $data[self::caseName($className, 'fillOpacity')] = [$className, 'fillOpacity'];
            $data[self::caseName($className, 'strokeOpacity')] = [$className, 'strokeOpacity'];
        }

        foreach (self::opacityClasses() as $className) {
            $data[self::caseName($className, 'opacity')] = [$className, 'opacity'];
        }

        return $data;
    }

    /**
     * @return array<string, array{0: class-string<BaseTag>}>
     */
    public static function pathLengthAttributeMethods(): array
    {
        return self::classCases(
            [
                Ellipse::class,
                Line::class,
                Path::class,
                Polygon::class,
                Polyline::class,
                Rect::class,
            ],
        );
    }

    /**
     * @return array<string, array{0: class-string<BaseTag>}>
     */
    public static function strokeMiterlimitAttributeMethods(): array
    {
        return self::classCases(self::paintClasses());
    }

    /**
     * @phpstan-param class-string<BaseTag> $className
     */
    #[DataProvider('opacityLikeAttributeMethods')]
    public function testSetOpacityLikeAttributeAcceptsMaximumValue(string $className, string $method): void
    {
        $instance = $className::tag();
        $result = self::callAttributeMethod($instance, $method, 1);

        self::assertInstanceOf(
            $className,
            $result,
            'Should accept the maximum opacity-like boundary value.',
        );
        self::assertNotSame(
            $instance,
            $result,
            'Should preserve immutable fluent updates for the maximum opacity-like boundary value.',
        );
    }

    /**
     * @phpstan-param class-string<BaseTag> $className
     */
    #[DataProvider('strokeMiterlimitAttributeMethods')]
    public function testSetStrokeMiterlimitAcceptsMinimumValue(string $className): void
    {
        $instance = $className::tag();
        $result = self::callAttributeMethod($instance, 'strokeMiterlimit', 1);

        self::assertInstanceOf(
            $className,
            $result,
            'Should accept the lower `stroke-miterlimit` boundary value.',
        );
        self::assertNotSame(
            $instance,
            $result,
            'Should preserve immutable fluent updates for the `stroke-miterlimit` boundary value.',
        );
    }

    public function testTextPaintAttributeMethodsRemainPublic(): void
    {
        $instance = Text::tag();

        self::assertNotSame($instance, $instance->fillOpacity(1));
        self::assertNotSame($instance, $instance->fillRule(FillRule::NONZERO));
        self::assertNotSame($instance, $instance->strokeLineCap(StrokeLineCap::ROUND));
        self::assertNotSame($instance, $instance->strokeLineJoin(StrokeLineJoin::ROUND));
        self::assertNotSame($instance, $instance->strokeMiterlimit(1));
        self::assertNotSame($instance, $instance->strokeOpacity(1));
    }

    /**
     * @param UnitEnum[] $allowedValues
     *
     * @phpstan-param class-string<BaseTag> $className
     * @phpstan-param list<UnitEnum> $allowedValues
     */
    #[DataProvider('enumBackedAttributeMethods')]
    public function testThrowInvalidArgumentExceptionForInvalidEnumBackedAttributeValue(
        string $className,
        string $method,
        SvgAttribute $attribute,
        array $allowedValues,
    ): void {
        $normalizedAllowedValues = self::normalizeEnumValues($allowedValues);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            HelperMessage::VALUE_NOT_IN_LIST->getMessage(
                'invalid-value',
                $attribute->value,
                implode("', '", $normalizedAllowedValues),
            ),
        );

        self::callAttributeMethod($className::tag(), $method, 'invalid-value');
    }

    /**
     * @phpstan-param class-string<BaseTag> $className
     */
    #[DataProvider('pathLengthAttributeMethods')]
    public function testThrowInvalidArgumentExceptionForNegativePathLengthValue(string $className): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_MUST_BE_POSITIVE_NUMBER_OR_NULL->getMessage(),
        );

        self::callAttributeMethod($className::tag(), 'pathLength', -5);
    }
    /**
     * @phpstan-param class-string<BaseTag> $className
     */
    #[DataProvider('opacityLikeAttributeMethods')]
    public function testThrowInvalidArgumentExceptionForOpacityLikeValueGreaterThanOne(
        string $className,
        string $method,
    ): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        self::callAttributeMethod($className::tag(), $method, 1.1);
    }


    /**
     * @phpstan-param class-string<BaseTag> $className
     */
    #[DataProvider('strokeMiterlimitAttributeMethods')]
    public function testThrowInvalidArgumentExceptionForStrokeMiterlimitValueBelowOne(string $className): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_MUST_BE_GTE_ONE_OR_NULL->getMessage(),
        );

        self::callAttributeMethod($className::tag(), 'strokeMiterlimit', 0.5);
    }

    /**
     * @param array<string, array{0: class-string<BaseTag>, 1: non-empty-string, 2: SvgAttribute, 3: list<UnitEnum>}> $data
     * @param class-string<BaseTag> $className
     * @param non-empty-string $method
     * @param list<UnitEnum> $allowedValues
     */
    private static function addEnumCase(
        array &$data,
        string $className,
        string $method,
        SvgAttribute $attribute,
        array $allowedValues,
    ): void {
        $data[self::caseName($className, $method)] = [$className, $method, $attribute, $allowedValues];
    }

    private static function callAttributeMethod(BaseTag $element, string $method, mixed $value): object
    {
        self::assertTrue(
            method_exists($element, $method),
            "Should expose the `$method()` SVG fluent attribute method.",
        );

        $result = (new ReflectionMethod($element, $method))->invoke($element, $value);

        self::assertIsObject(
            $result,
            "Should return an object from the `$method()` SVG fluent attribute method.",
        );

        return $result;
    }

    /**
     * @param class-string<BaseTag> $className
     * @param non-empty-string $method
     */
    private static function caseName(string $className, string $method): string
    {
        return $className . '::' . $method;
    }

    /**
     * @param list<class-string<BaseTag>> $classes
     *
     * @return array<string, array{0: class-string<BaseTag>}>
     */
    private static function classCases(array $classes): array
    {
        $data = [];

        foreach ($classes as $className) {
            $data[$className] = [$className];
        }

        return $data;
    }

    /**
     * @param UnitEnum[] $allowedValues
     *
     * @return string[]
     *
     * @phpstan-param list<UnitEnum> $allowedValues
     */
    private static function normalizeEnumValues(array $allowedValues): array
    {
        return array_map(
            static fn(UnitEnum $value): string => $value instanceof BackedEnum ? (string) $value->value : $value->name,
            $allowedValues,
        );
    }

    /**
     * @return list<class-string<BaseTag>>
     */
    private static function opacityClasses(): array
    {
        return [
            Svg::class,
            Circle::class,
            ClipPath::class,
            Ellipse::class,
            ForeignObject::class,
            G::class,
            Image::class,
            Line::class,
            Marker::class,
            Path::class,
            Polygon::class,
            Polyline::class,
            RadialGradient::class,
            Rect::class,
            Symbol::class,
            Text::class,
            Uses::class,
        ];
    }

    /**
     * @return list<class-string<BaseTag>>
     */
    private static function paintClasses(): array
    {
        return [
            Svg::class,
            Circle::class,
            Ellipse::class,
            G::class,
            Line::class,
            Path::class,
            Polygon::class,
            Polyline::class,
            Rect::class,
            Text::class,
        ];
    }
}
