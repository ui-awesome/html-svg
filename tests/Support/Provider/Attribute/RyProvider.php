<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasRyTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `ry` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `ry` attribute, supporting
 * appropriate types and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `ry` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `ry` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RyProvider
{
    /**
     * Provides test cases for SVG `ry` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `ry` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `ry` attribute scenarios.
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
                50.5,
                [],
                50.5,
                ' ry="50.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                100,
                [],
                100,
                ' ry="100"',
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
                75,
                ['ry' => 50],
                75,
                ' ry="75"',
                "Should return new 'ry' after replacing the existing 'ry' attribute.",
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' ry="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with units' => [
                '10px',
                [],
                '10px',
                ' ry="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['ry' => 100],
                '',
                '',
                "Should unset the 'ry' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
