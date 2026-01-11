<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFillOpacityTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `fillopacity` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `fillopacity` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `fillopacity` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `fillopacity` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FillOpacityProvider
{
    /**
     * Provides test cases for SVG `fillopacity` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `fillopacity` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `fillopacity` attribute scenarios.
     *
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'float' => [
                0.5,
                [],
                0.5,
                ' fill-opacity="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                0,
                [],
                0,
                ' fill-opacity="0"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when attribute is set to 'null'.",
            ],
            'replace existing' => [
                '0.5',
                ['fill-opacity' => '0.8'],
                '0.5',
                ' fill-opacity="0.5"',
                "Should return new 'fill-opacity' after replacing existing 'fill-opacity' attribute.",
            ],
            'string' => [
                '0',
                [],
                '0',
                ' fill-opacity="0"',
                'Should return the attribute value after setting it.',
            ],
            'string float' => [
                '0.5',
                [],
                '0.5',
                ' fill-opacity="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['fill-opacity' => '0.5'],
                '',
                '',
                "Should unset the 'fill-opacity' attribute when 'null' is provided after a value.",
            ],
            'value exactly 1' => [
                1,
                [],
                1,
                ' fill-opacity="1"',
                "Should accept value exactly '1'.",
            ],
        ];
    }
}
