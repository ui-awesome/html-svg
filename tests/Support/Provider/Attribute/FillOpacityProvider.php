<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFillOpacityTest} class.
 *
 * Supplies comprehensive test data for validating handling of SVG `fill-opacity` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting `fill-opacity` attribute, supporting
 * both explicit string and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of `fill-opacity` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of empty string, `null`, and standard string for `fill-opacity` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FillOpacityProvider
{
    /**
     * Provides test cases for SVG `fill-opacity` attribute rendering scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of SVG `fill-opacity` attribute, including
     * empty string, `null`, and standard string.
     *
     * Each test case includes input value, initial attributes, expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for `fill-opacity` attribute rendering scenarios.
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
                "Should return an empty string when attribute is set to 'null'.",
            ],
            'replace existing' => [
                '0.5',
                ['fill-opacity' => '0.8'],
                ' fill-opacity="0.5"',
                "Should return new 'fill-opacity' after replacing existing 'fill-opacity' attribute.",
            ],
            'decimal value' => [
                '0.5',
                [],
                ' fill-opacity="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'full opacity' => [
                '1',
                [],
                ' fill-opacity="1"',
                'Should return the attribute value after setting it to full opacity.',
            ],
            'zero opacity' => [
                '0',
                [],
                ' fill-opacity="0"',
                'Should return the attribute value after setting it to zero opacity.',
            ],
            'unset with null' => [
                null,
                ['fill-opacity' => '0.5'],
                '',
                "Should unset the 'fill-opacity' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for SVG `fill-opacity` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of SVG `fill-opacity` attribute, including
     * empty string, `null`, and standard string.
     *
     * Each test case includes input value, initial attributes, expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `fill-opacity` attribute scenarios.
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
                "Should return an empty string when attribute is set to 'null'.",
            ],
            'replace existing' => [
                '0.5',
                ['fill-opacity' => '0.8'],
                '0.5',
                "Should return new 'fill-opacity' after replacing existing 'fill-opacity' attribute.",
            ],
            'decimal value' => [
                '0.5',
                [],
                '0.5',
                'Should return the attribute value after setting it.',
            ],
            'full opacity' => [
                '1',
                [],
                '1',
                'Should return the attribute value after setting it to full opacity.',
            ],
            'zero opacity' => [
                '0',
                [],
                '0',
                'Should return the attribute value after setting it to zero opacity.',
            ],
            'unset with null' => [
                null,
                ['fill-opacity' => '0.5'],
                '',
                "Should unset the 'fill-opacity' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
