<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\PreserveAspectRatio;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasPreserveAspectRatioTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `preserveAspectRatio` attribute in tag
 * rendering, ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `preserveAspectRatio` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `preserveAspectRatio` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `preserveAspectRatio` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PreserveAspectRatioProvider
{
    /**
     * Provides test cases for SVG `preserveAspectRatio` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `preserveAspectRatio` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `preserveAspectRatio` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(PreserveAspectRatio::class, 'preserveAspectRatio');

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
                'xMaxYMax slice',
                ['preserveAspectRatio' => 'xMinYMin meet'],
                'xMaxYMax slice',
                ' preserveAspectRatio="xMaxYMax slice"',
                "Should return new 'preserveAspectRatio' after replacing the existing 'preserveAspectRatio' attribute.",
            ],
            'string' => [
                'xMidYMid meet',
                [],
                'xMidYMid meet',
                ' preserveAspectRatio="xMidYMid meet"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['preserveAspectRatio' => 'xMidYMid meet'],
                '',
                '',
                "Should unset the 'preserveAspectRatio' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
