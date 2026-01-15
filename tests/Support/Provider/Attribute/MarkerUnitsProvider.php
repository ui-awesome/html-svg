<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\MarkerUnits;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasMarkerUnitsTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `markerUnits` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `markerUnits` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `markerUnits` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `markerUnits` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MarkerUnitsProvider
{
    /**
     * Provides test cases for SVG `markerUnits` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `markerUnits` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `markerUnits` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(MarkerUnits::class, 'markerUnits');

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
                'userSpaceOnUse',
                ['markerUnits' => 'strokeWidth'],
                'userSpaceOnUse',
                ' markerUnits="userSpaceOnUse"',
                "Should return new 'markerUnits' after replacing the existing 'markerUnits' attribute.",
            ],
            'string' => [
                'strokeWidth',
                [],
                'strokeWidth',
                ' markerUnits="strokeWidth"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['markerUnits' => 'strokeWidth'],
                '',
                '',
                "Should unset the 'markerUnits' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
