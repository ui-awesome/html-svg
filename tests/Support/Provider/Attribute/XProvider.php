<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasXTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `x` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `x` attribute, supporting float,
 * int, string, and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `x` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of float, int, string, and `null` for the `x` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class XProvider
{
    /**
     * Provides test cases for SVG `x` attribute rendering scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `x` attribute, including float,
     * int, string, and `null`.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for `x` attribute rendering scenarios.
     *
     * @phpstan-return array<string, array{float|int|string|null, mixed[], string, string}>
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
            'float' => [
                10.3,
                [],
                ' x="10.3"',
                'Should return the attribute value after setting a float.',
            ],
            'integer' => [
                10,
                [],
                ' x="10"',
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
                ['x' => '50'],
                ' x="75"',
                "Should return new 'x' after replacing the existing 'x' attribute.",
            ],
            'string' => [
                '100',
                [],
                ' x="100"',
                'Should return the attribute value after setting it.',
            ],
            'string percentage' => [
                '50%',
                [],
                ' x="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with units' => [
                '10px',
                [],
                ' x="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['x' => '100'],
                '',
                "Should unset the 'x' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for SVG `x` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `x` attribute, including float,
     * int, string, and `null`.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `x` attribute scenarios.
     *
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string}>
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
            'float' => [
                10.3,
                [],
                10.3,
                'Should return the attribute value after setting a float.',
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
                ['x' => '50'],
                '75',
                "Should return new 'x' after replacing the existing 'x' attribute.",
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
                ['x' => '100'],
                '',
                "Should unset the 'x' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
