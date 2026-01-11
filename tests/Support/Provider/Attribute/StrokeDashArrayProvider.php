<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeDashArrayTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `strokedasharray` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `strokedasharray` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `strokedasharray` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `strokedasharray` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeDashArrayProvider
{
    /**
     * Provides test cases for SVG `strokedasharray` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `strokedasharray` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `strokedasharray` attribute scenarios.
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
                3.5,
                [],
                3.5,
                ' stroke-dasharray="3.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                3,
                [],
                3,
                ' stroke-dasharray="3"',
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
                ['stroke-dasharray' => '2'],
                '1.5em',
                ' stroke-dasharray="1.5em"',
                "Should return new 'stroke-dasharray' after replacing the existing 'stroke-dasharray' attribute.",
            ],
            'string' => [
                '1.5em',
                [],
                '1.5em',
                ' stroke-dasharray="1.5em"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-dasharray' => '2'],
                '',
                '',
                "Should unset the 'stroke-dasharray' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
