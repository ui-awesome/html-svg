<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `stroke` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to the SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `stroke` attribute, supporting
 * both explicit string and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `stroke` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of empty string, `null`, and standard string for the `stroke` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeProvider
{
    /**
     * Provides test cases for SVG `stroke` attribute rendering scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `stroke` attribute, including
     * empty string, `null`, and standard string.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for `stroke` attribute rendering scenarios.
     *
     * @phpstan-return array<string, array{string|null, mixed[], string, string}>
     */
    public static function renderAttribute(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'red',
                ['stroke' => 'blue'],
                ' stroke="red"',
                "Should return new 'stroke' after replacing the existing 'stroke' attribute.",
            ],
            'string color' => [
                'red',
                [],
                ' stroke="red"',
                'Should return the attribute value after setting it.',
            ],
            'string gradient' => [
                'url(#gradient1)',
                [],
                ' stroke="url(#gradient1)"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke' => 'red'],
                '',
                "Should unset the 'stroke' attribute when 'null' is provided after a value.",
            ],
        ];
    }

    /**
     * Provides test cases for SVG `stroke` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `stroke` attribute, including
     * empty string, `null`, and standard string.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `stroke` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null, mixed[], string, string}>
     */
    public static function values(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'null' => [
                null,
                [],
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'red',
                ['stroke' => 'blue'],
                'red',
                "Should return new 'stroke' after replacing the existing 'stroke' attribute.",
            ],
            'string color' => [
                'red',
                [],
                'red',
                'Should return the attribute value after setting it.',
            ],
            'string gradient' => [
                'url(#gradient1)',
                [],
                'url(#gradient1)',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke' => 'red'],
                '',
                "Should unset the 'stroke' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
