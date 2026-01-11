<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeMiterlimitTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `strokemiterlimit` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `strokemiterlimit` attribute, supporting
 * appropriate types and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `strokemiterlimit` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `strokemiterlimit` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeMiterlimitProvider
{
    /**
     * Provides test cases for SVG `strokemiterlimit` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `strokemiterlimit` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `strokemiterlimit` attribute scenarios.
     *
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when attribute is set to 'null'.",
            ],
            'float' => [
                4.0,
                [],
                4.0,
                ' stroke-miterlimit="4"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                4,
                [],
                4,
                ' stroke-miterlimit="4"',
                'Should return the attribute value after setting it.',
            ],
            'replace existing' => [
                '4',
                ['stroke-miterlimit' => '10'],
                '4',
                ' stroke-miterlimit="4"',
                "Should return new 'stroke-miterlimit' after replacing existing 'stroke-miterlimit' attribute.",
            ],
            'string' => [
                '1',
                [],
                '1',
                ' stroke-miterlimit="1"',
                'Should return the attribute value after setting it.',
            ],
            'string float' => [
                '3.5',
                [],
                '3.5',
                ' stroke-miterlimit="3.5"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-miterlimit' => '4'],
                '',
                '',
                "Should unset the 'stroke-miterlimit' attribute when 'null' is provided after a value.",
            ],
            'value exactly 1' => [
                1,
                [],
                1,
                ' stroke-miterlimit="1"',
                "Should accept value exactly '1'.",
            ],
        ];
    }
}
