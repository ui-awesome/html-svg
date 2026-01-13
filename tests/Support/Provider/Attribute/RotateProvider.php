<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasRotateTest} test cases.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `rotate` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `rotate` attribute, supporting
 * appropriate types and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `rotate` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `rotate` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RotateProvider
{
    /**
     * Provides test cases for SVG `rotate` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `rotate` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `rotate` attribute scenarios.
     *
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
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
            'float' => [
                5.5,
                [],
                5.5,
                ' rotate="5.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' rotate="10"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '20',
                ['rotate' => '10'],
                '20',
                ' rotate="20"',
                "Should return new 'rotate' after replacing the existing 'rotate' attribute.",
            ],
            'string' => [
                '15',
                [],
                '15',
                ' rotate="15"',
                'Should return the attribute value after setting it.',
            ],
            'string space-separated list' => [
                '10 20 30 40',
                [],
                '10 20 30 40',
                ' rotate="10 20 30 40"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['rotate' => '10'],
                '',
                '',
                "Should unset the 'rotate' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
