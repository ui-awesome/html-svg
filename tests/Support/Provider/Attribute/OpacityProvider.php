<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasOpacityTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `opacity` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `opacity` attribute, supporting
 * explicit float, int, string and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `opacity` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of empty string, float, int, `null`, and standard string for the `opacity` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class OpacityProvider
{
    /**
     * Provides test cases for SVG `opacity` attribute rendering scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `opacity` attribute, including
     * empty string, float, int, `null`, and standard string.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for `opacity` attribute rendering scenarios.
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
            'int' => [
                0,
                [],
                ' opacity="0"',
                'Should return the attribute value after setting it.',
            ],
            'float' => [
                0.3,
                [],
                ' opacity="0.3"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '1.5em',
                ['opacity' => '1'],
                ' opacity="1.5em"',
                "Should return new 'opacity' after replacing the existing 'opacity' attribute.",
            ],
            'string' => [
                '1.5em',
                [],
                ' opacity="1.5em"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['opacity' => '1'],
                '',
                "Should unset the 'opacity' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for SVG `opacity` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `opacity` attribute, including
     * empty string, float, int, `null`, and standard string.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `opacity` attribute scenarios.
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
            'int' => [
                0,
                [],
                0,
                'Should return the attribute value after setting it.',
            ],
            'float' => [
                0.3,
                [],
                0.3,
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '1.5em',
                ['opacity' => '1'],
                '1.5em',
                "Should return new 'opacity' after replacing the existing 'opacity' attribute.",
            ],
            'string' => [
                '1.5em',
                [],
                '1.5em',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['opacity' => '1'],
                '',
                "Should unset the 'opacity' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
