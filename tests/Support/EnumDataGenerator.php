<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support;

use UIAwesome\Html\Helper\Enum;
use UnitEnum;

use function sprintf;
use function strtolower;

/**
 * Utility class for generating structured test data for enum-based HTML attribute scenarios.
 *
 * Provides a standardized API for producing test cases involving PHP enums and HTML attributes, supporting
 * normalization and comparison of enum values for robust validation in PHPUnit test suites.
 *
 * Designed to facilitate consistent and type-safe generation of test data for attribute rendering, value extraction,
 * and output verification in HTML contexts.
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
     * @phpstan-param class-string<UnitEnum> $enumClass Enum class name implementing UnitEnum.
     * @param string $enumClass Enum class name implementing UnitEnum.
     * @param string $attribute HTML attribute name to test.
     * @param bool $asHtml Whether to generate expected output as HTML attribute or enum instance. Default is `true`.
     *
     * @return array Structured test cases indexed by normalized enum value.
     *
     * @phpstan-return array<string, array{UnitEnum, mixed[], string|UnitEnum, string}>
     */
    public static function cases(string $enumClass, string $attribute, bool $asHtml = true): array
    {
        $cases = [];

        foreach ($enumClass::cases() as $case) {
            $normalizedValue = strtolower((string) Enum::normalizeValue($case));

            $key = "enum: {$normalizedValue}";
            $expected = $asHtml ? " {$attribute}=\"{$normalizedValue}\"" : $case;
            $message = $asHtml
                ? "Should return the '{$attribute}' attribute value for enum case: {$normalizedValue}."
                : "Should return the enum instance for case: {$normalizedValue}.";

            $cases[$key] = [
                $case,
                [],
                $expected,
                $message,
            ];
        }

        return $cases;
    }

    /**
     * Generates test cases for tag-related enum scenarios.
     *
     * Produces a dataset mapping descriptive test names to enum cases and their string values,
     * suitable for data provider methods in PHPUnit tests.
     *
     * @phpstan-param class-string<UnitEnum> $enumClass Enum class name implementing UnitEnum.
     * @param string $enumClass Enum class name implementing UnitEnum.
     * @param string $category Descriptive category label for the tag type.
     *
     * @phpstan-return array<string, array{UnitEnum, string}> Structured test cases indexed by descriptive keys.
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
