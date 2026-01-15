<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasViewBoxTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `viewBox` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `viewBox` attribute, supporting
 * string type and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `viewBox` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of string type and `null` for the `viewBox` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ViewBoxProvider
{
    /**
     * Provides test cases for SVG `viewBox` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `viewBox` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `viewBox` attribute scenarios.
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
                '0 0 100 100',
                ['viewBox' => '0 0 50 50'],
                '0 0 100 100',
                ' viewBox="0 0 100 100"',
                "Should return new 'viewBox' after replacing the existing 'viewBox' attribute.",
            ],
            'string' => [
                '0 0 200 200',
                [],
                '0 0 200 200',
                ' viewBox="0 0 200 200"',
                'Should return the attribute value after setting it.',
            ],
            'string with negative origin' => [
                '-50 -50 100 100',
                [],
                '-50 -50 100 100',
                ' viewBox="-50 -50 100 100"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['viewBox' => '0 0 100 100'],
                '',
                '',
                "Should unset the 'viewBox' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
