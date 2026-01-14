<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasPointsTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `points` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `points` attribute, supporting
 * appropriate types and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `points` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `points` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PointsProvider
{
    /**
     * Provides test cases for SVG `points` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `points` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `points` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null, mixed[], string, string, string}>
     */
    public static function values(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '0,0 10,10 20,0',
                ['points' => '0,0 0,10'],
                '0,0 10,10 20,0',
                ' points="0,0 10,10 20,0"',
                "Should return new 'points' after replacing the existing 'points' attribute.",
            ],
            'string list of points' => [
                '0,100 50,25 50,75 100,0',
                [],
                '0,100 50,25 50,75 100,0',
                ' points="0,100 50,25 50,75 100,0"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['points' => '0,0 10,10'],
                '',
                '',
                "Should unset the 'points' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
