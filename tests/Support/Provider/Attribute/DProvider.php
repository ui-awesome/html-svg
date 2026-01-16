<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasDTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `d` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `d` attribute, supporting
 * appropriate types and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `d` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `d` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DProvider
{
    /**
     * Provides test cases for SVG `d` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `d` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `d` attribute scenarios.
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
                'M10 10 H 90 V 90 H 10 Z',
                ['d' => 'M0 0 L 10 10'],
                'M10 10 H 90 V 90 H 10 Z',
                ' d="M10 10 H 90 V 90 H 10 Z"',
                "Should return new 'd' after replacing the existing 'd' attribute.",
            ],
            'string path data' => [
                'M10 10 H 90 V 90 H 10 Z',
                [],
                'M10 10 H 90 V 90 H 10 Z',
                ' d="M10 10 H 90 V 90 H 10 Z"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['d' => 'M10 10 H 90 V 90 H 10 Z'],
                '',
                '',
                "Should unset the 'd' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
