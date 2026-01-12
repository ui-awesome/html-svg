<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFontFamilyTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `font-family` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `font-family` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `font-family` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `font-family` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FontFamilyProvider
{
    /**
     * Provides test cases for SVG `font-family` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `font-family` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `font-family` attribute scenarios.
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
                'Arial',
                ['font-family' => 'Verdana'],
                'Arial',
                ' font-family="Arial"',
                "Should return new 'font-family' after replacing the existing 'font-family' attribute.",
            ],
            'string' => [
                'Arial',
                [],
                'Arial',
                ' font-family="Arial"',
                'Should return the attribute value after setting it.',
            ],
            'string with lists of names' => [
                'Arial, sans-serif',
                [],
                'Arial, sans-serif',
                ' font-family="Arial, sans-serif"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['font-family' => 'Arial'],
                '',
                '',
                "Should unset the 'font-family' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
