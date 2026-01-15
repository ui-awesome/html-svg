<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\MaskType;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasMaskTypeTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `mask-type` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the CSS Masking Module
 * Level 1 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `mask-type` attribute,
 * supporting appropriate types and `null` for attribute removal.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `mask-type` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `mask-type` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MaskTypeProvider
{
    /**
     * Provides test cases for SVG `mask-type` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `mask-type` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `mask-type` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(MaskType::class, 'mask-type');

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
                'alpha',
                ['mask-type' => 'luminance'],
                'alpha',
                ' mask-type="alpha"',
                "Should return new 'mask-type' after replacing the existing 'mask-type' attribute.",
            ],
            'string' => [
                'luminance',
                [],
                'luminance',
                ' mask-type="luminance"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['mask-type' => 'luminance'],
                '',
                '',
                "Should unset the 'mask-type' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
