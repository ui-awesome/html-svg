<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFillTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `fill` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the SVG specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `fill` attribute, supporting
 * both explicit string and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `fill` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of empty string, `null`, and standard string for the `fill` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FillProvider
{
    /**
     * Provides test cases for SVG `fill` attribute rendering scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `fill` attribute, including empty
     * string, `null`, and standard string.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for `fill` attribute rendering scenarios.
     *
     * @phpstan-return array<string, array{string|null, mixed[], string, string}>
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
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'red',
                ['fill' => 'blue'],
                ' fill="red"',
                "Should return new 'fill' after replacing the existing 'fill' attribute.",
            ],
            'string color' => [
                'red',
                [],
                ' fill="red"',
                'Should return the attribute value after setting it.',
            ],
            'string gradient' => [
                'url(#gradient1)',
                [],
                ' fill="url(#gradient1)"',
                'Should return the attribute value after setting it to a gradient reference.',
            ],
            'unset with null' => [
                null,
                ['fill' => 'red'],
                '',
                "Should unset the 'fill' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for SVG `fill` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `fill` attribute, including empty
     * string, `null`, and standard string.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `fill` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null, mixed[], string, string}>
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
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'red',
                ['fill' => 'blue'],
                'red',
                "Should return new 'fill' after replacing the existing 'fill' attribute.",
            ],
            'string color' => [
                'red',
                [],
                'red',
                'Should return the attribute value after setting it.',
            ],
            'string gradient' => [
                'url(#gradient1)',
                [],
                'url(#gradient1)',
                'Should return the attribute value after setting it to a gradient reference.',
            ],
            'unset with null' => [
                null,
                ['fill' => 'red'],
                '',
                "Should unset the 'fill' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
