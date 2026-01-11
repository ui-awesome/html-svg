<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasTransformTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `transform` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `transform` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `transform` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `transform` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TransformProvider
{
    /**
     * Provides test cases for SVG `transform` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `transform` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `transform` attribute scenarios.
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
                'rotate(45)',
                ['transform' => 'rotate(30)'],
                'rotate(45)',
                ' transform="rotate(45)"',
                "Should return new 'transform' after replacing the existing 'transform' attribute.",
            ],
            'string' => [
                'rotate(45)',
                [],
                'rotate(45)',
                ' transform="rotate(45)"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['transform' => 'rotate(30)'],
                '',
                '',
                "Should unset the 'transform' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
