<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeWidthTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `stroke-width` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `stroke-width` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `stroke-width` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `stroke-width` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeWidthProvider
{
    /**
     * Provides test cases for SVG `stroke-width` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `stroke-width` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `stroke-width` attribute scenarios.
     *
     * @phpstan-return array<string, array{int|string|null, mixed[], int|string, string, string}>
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
            'integer' => [
                3,
                [],
                3,
                ' stroke-width="3"',
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
                '1.5em',
                ['stroke-width' => '2'],
                '1.5em',
                ' stroke-width="1.5em"',
                "Should return new 'stroke-width' after replacing the existing 'stroke-width' attribute.",
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' stroke-width="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '1.5em',
                [],
                '1.5em',
                ' stroke-width="1.5em"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-width' => '2'],
                '',
                '',
                "Should unset the 'stroke-width' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
