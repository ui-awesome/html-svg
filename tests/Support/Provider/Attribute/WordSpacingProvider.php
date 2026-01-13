<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasWordSpacingTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `word-spacing` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `word-spacing` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `word-spacing` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `word-spacing` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class WordSpacingProvider
{
    /**
     * Provides test cases for SVG `word-spacing` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `word-spacing` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `word-spacing` attribute scenarios.
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
                ' word-spacing="5.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' word-spacing="10"',
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
                ['word-spacing' => '10'],
                '20',
                ' word-spacing="20"',
                "Should return new 'word-spacing' after replacing the existing 'word-spacing' attribute.",
            ],
            'string' => [
                '15',
                [],
                '15',
                ' word-spacing="15"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['word-spacing' => '10'],
                '',
                '',
                "Should unset the 'word-spacing' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
