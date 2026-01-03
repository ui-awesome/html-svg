<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasYTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `y` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `y` attribute, supporting int,
 * string, and `null` for attribute removal, to maintain consistent output across different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `y` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of int, string, and `null` for the `y` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class YProvider
{
    /**
     * Provides test cases for SVG `y` attribute rendering scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `y` attribute, including int,
     * string, and `null`.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for `y` attribute rendering scenarios.
     *
     * @phpstan-return array<string, array{int|string|null, mixed[], string, string}>
     */
    public static function renderAttribute(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'integer' => [
                10,
                [],
                ' y="10"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '75',
                ['y' => '50'],
                ' y="75"',
                "Should return new 'y' after replacing the existing 'y' attribute.",
            ],
            'string' => [
                '100',
                [],
                ' y="100"',
                'Should return the attribute value after setting it.',
            ],
            'string percentage' => [
                '50%',
                [],
                ' y="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with units' => [
                '10px',
                [],
                ' y="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['y' => '100'],
                '',
                "Should unset the 'y' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for SVG `y` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `y` attribute, including int,
     * string, and `null`.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `y` attribute scenarios.
     *
     * @phpstan-return array<string, array{int|string|null, mixed[], int|string, string}>
     */
    public static function values(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'integer' => [
                10,
                [],
                10,
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '75',
                ['y' => '50'],
                '75',
                "Should return new 'y' after replacing the existing 'y' attribute.",
            ],
            'string' => [
                '100',
                [],
                '100',
                'Should return the attribute value after setting it.',
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                'Should return the attribute value after setting it.',
            ],
            'string with units' => [
                '10px',
                [],
                '10px',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['y' => '100'],
                '',
                "Should unset the 'y' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
