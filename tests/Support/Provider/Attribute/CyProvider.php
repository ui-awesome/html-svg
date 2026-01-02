<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasCyTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `cy` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `cy` attribute, supporting both
 * explicit numeric values, strings with units, and `null` for attribute removal, to maintain consistent output across
 * different rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `cy` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of numeric, string, and `null` values for the `cy` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class CyProvider
{
    /**
     * Provides test cases for SVG `cy` attribute rendering scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `cy` attribute, including numeric,
     * string with units, and `null` values.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for `cy` attribute rendering scenarios.
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
                50.5,
                [],
                ' cy="50.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                100,
                [],
                ' cy="100"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                75,
                ['cy' => 50],
                ' cy="75"',
                "Should return new 'cy' after replacing the existing 'cy' attribute.",
            ],
            'string percentage' => [
                '50%',
                [],
                ' cy="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with units' => [
                '10px',
                [],
                ' cy="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['cy' => 100],
                '',
                "Should unset the 'cy' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for SVG `cy` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `cy` attribute, including numeric,
     * string with units, and `null` values.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `cy` attribute scenarios.
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
                50.5,
                [],
                50.5,
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                100,
                [],
                100,
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                75,
                ['cy' => 50],
                75,
                "Should return new 'cy' after replacing the existing 'cy' attribute.",
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
                ['cy' => 100],
                '',
                "Should unset the 'cy' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
