<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support;

use UIAwesome\Html\Helper\Enum;
use UnitEnum;

use function sprintf;

/**
 * Test data generator for enum-based attribute scenarios.
 *
 * Builds deterministic datasets for PHPUnit data providers using {@see UnitEnum} cases and normalized values.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class EnumDataGenerator
{
    /**
     * Generates a set of test cases for validating enum-based HTML attribute rendering and value extraction.
     *
     * Normalizes enum values and produces expected output for both HTML attribute and enum instance scenarios,
     * supporting platform-independent and type-safe test validation.
     *
     * @param string $enumClass Enum class name implementing UnitEnum.
     * @param string|UnitEnum $attribute HTML attribute name to test.
     *
     * @return array Structured test cases indexed by normalized enum value.
     *
     * @phpstan-param class-string<UnitEnum> $enumClass Enum class name implementing UnitEnum.
     * @phpstan-return array<string, array{UnitEnum, mixed[], UnitEnum, string, string}>
     */
    public static function cases(string $enumClass, string|UnitEnum $attribute): array
    {
        $attribute = Enum::normalizeValue($attribute);
        $cases = [];

        foreach ($enumClass::cases() as $case) {
            $normalizedValue = Enum::normalizeValue($case);

            $key = "enum: {$normalizedValue}";

            $cases[$key] = [
                $case,
                [],
                $case,
                " {$attribute}=\"{$normalizedValue}\"",
                "Should return the '{$attribute}' attribute value for enum case: {$normalizedValue}.",
            ];
        }

        return $cases;
    }

    /**
     * Generates test cases for tag-related enum scenarios.
     *
     * Produces a dataset mapping descriptive test names to enum cases and their string values, suitable for data
     * provider methods in PHPUnit tests.
     *
     * @phpstan-param class-string<UnitEnum> $enumClass Enum class name implementing UnitEnum.
     * @param string $enumClass Enum class name implementing UnitEnum.
     * @param string $category Descriptive category label for the tag type.
     *
     * @phpstan-return array<string, array{UnitEnum, string}>
     * @return array<string, array{UnitEnum, string}>
     */
    public static function tagCases(string $enumClass, string $category): array
    {
        $data = [];

        foreach ($enumClass::cases() as $case) {
            $value = (string) Enum::normalizeValue($case);
            $data[sprintf('%s %s tag', $value, $category)] = [$case, $value];
        }

        return $data;
    }
}
