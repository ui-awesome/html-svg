<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\StrokeLineCap;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeLineCapTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `stroke-linecap` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `stroke-linecap` attribute,
 * supporting string, UnitEnum and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `stroke-linecap` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of string, UnitEnum, and `null` for the `stroke-linecap` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeLineCapProvider
{
    /**
     * Provides test cases for rendered HTML `stroke-linecap` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the global HTML `stroke-linecap`
     * attribute, including string, UnitEnum, and `null`.
     *
     * Each test case includes the input value, the initial attributes, the expected rendered output, and an assertion
     * message for clear identification.
     *
     * @return array Test data for rendered `stroke-linecap` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string}>
     */
    public static function renderAttribute(): array
    {
        $enumCases = EnumDataGenerator::cases(StrokeLineCap::class, 'stroke-linecap');

        $staticCases = [
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
                'butt',
                ['stroke-linecap' => 'round'],
                ' stroke-linecap="butt"',
                "Should return new 'stroke-linecap' after replacing the existing 'stroke-linecap' attribute.",
            ],
            'string' => [
                'butt',
                [],
                ' stroke-linecap="butt"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-linecap' => 'butt'],
                '',
                "Should unset the 'stroke-linecap' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }

    /**
     * Provides test cases for HTML `stroke-linecap` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the global HTML `stroke-linecap`
     * attribute, including string, UnitEnum, and `null`.
     *
     * Each test case includes the input value, the initial attributes, the expected value, and an assertion message for
     * clear identification.
     *
     * @return array Test data for `stroke-linecap` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|UnitEnum|null, mixed[], string|UnitEnum, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(StrokeLineCap::class, 'stroke-linecap', false);

        $staticCases = [
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
                'butt',
                ['stroke-linecap' => 'round'],
                'butt',
                "Should return new 'stroke-linecap' after replacing the existing 'stroke-linecap' attribute.",
            ],
            'string' => [
                'butt',
                [],
                'butt',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-linecap' => 'butt'],
                '',
                "Should unset the 'stroke-linecap' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
