<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasTextLengthTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `textLength` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `textLength` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `textLength` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `textLength` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TextLengthProvider
{
    /**
     * Provides test cases for SVG `textLength` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `textLength` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `textLength` attribute scenarios.
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
                ' textLength="5.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' textLength="10"',
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
                ['textLength' => '10'],
                '20',
                ' textLength="20"',
                "Should return new 'textLength' after replacing the existing 'textLength' attribute.",
            ],
            'string' => [
                '15',
                [],
                '15',
                ' textLength="15"',
                'Should return the attribute value after setting it.',
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' textLength="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '6em',
                [],
                '6em',
                ' textLength="6em"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['textLength' => '10'],
                '',
                '',
                "Should unset the 'textLength' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
