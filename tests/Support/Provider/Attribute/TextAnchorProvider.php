<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\{SvgAttribute, TextAnchor};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasTextAnchorTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `text-anchor` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `text-anchor` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `text-anchor` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `text-anchor` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TextAnchorProvider
{
    /**
     * Provides test cases for SVG `text-anchor` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `text-anchor` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `text-anchor` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(TextAnchor::class, SvgAttribute::TEXT_ANCHOR);

        $staticCases = [
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
                'start',
                ['text-anchor' =>
                'middle'],
                'start',
                ' text-anchor="start"',
                "Should return new 'text-anchor' after replacing the existing 'text-anchor' attribute.",
            ],
            'string' => [
                'middle',
                [],
                'middle',
                ' text-anchor="middle"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['text-anchor' => 'end'],
                '',
                '',
                "Should unset the 'text-anchor' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
