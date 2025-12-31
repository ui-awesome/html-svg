<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeMiterlimitTest} class.
 *
 * Supplies comprehensive test data for validating handling of SVG `stroke-miterlimit` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting `stroke-miterlimit` attribute,
 * supporting explicit int, string and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of `stroke-miterlimit` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of int, `null`, and standard string for `stroke-miterlimit` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeMiterlimitProvider
{
    /**
     * Provides test cases for SVG `stroke-miterlimit` attribute rendering scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of SVG `stroke-miterlimit` attribute,
     * including int, `null`, and standard string.
     *
     * Each test case includes input value, initial attributes, expected rendered output, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `stroke-miterlimit` attribute rendering scenarios.
     *
     * @phpstan-return array<string, array{int|string|null, mixed[], string, string}>
     */
    public static function renderAttribute(): array
    {
        return [
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when attribute is set to 'null'.",
            ],
            'int' => [
                4,
                [],
                ' stroke-miterlimit="4"',
                'Should return the attribute value after setting it.',
            ],
            'replace existing' => [
                '4',
                ['stroke-miterlimit' => '10'],
                ' stroke-miterlimit="4"',
                "Should return new 'stroke-miterlimit' after replacing existing 'stroke-miterlimit' attribute.",
            ],
            'string' => [
                '1',
                [],
                ' stroke-miterlimit="1"',
                'Should return the attribute value after setting it.',
            ],
            'string decimal' => [
                '3.5',
                [],
                ' stroke-miterlimit="3.5"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-miterlimit' => '4'],
                '',
                "Should unset the 'stroke-miterlimit' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for SVG `stroke-miterlimit` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of SVG `stroke-miterlimit` attribute,
     * including int, `null`, and standard string.
     *
     * Each test case includes input value, initial attributes, expected value, and an assertion message for clear
     * identification.
     *
     * @return array Test data for `stroke-miterlimit` attribute scenarios.
     *
     * @phpstan-return array<string, array{int|string|null, mixed[], int|string, string}>
     */
    public static function values(): array
    {
        return [
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when attribute is set to 'null'.",
            ],
            'int' => [
                4,
                [],
                4,
                'Should return the attribute value after setting it.',
            ],
            'replace existing' => [
                '4',
                ['stroke-miterlimit' => '10'],
                '4',
                "Should return new 'stroke-miterlimit' after replacing existing 'stroke-miterlimit' attribute.",
            ],
            'string' => [
                '1',
                [],
                '1',
                'Should return the attribute value after setting it.',
            ],
            'string decimal' => [
                '3.5',
                [],
                '3.5',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-miterlimit' => '4'],
                '',
                "Should unset the 'stroke-miterlimit' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
