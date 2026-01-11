<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\FillRule;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFillRuleTest} class.
 *
 * Supplies comprehensive test data for validating handling of SVG `fill-rule` attribute in tag rendering, ensuring
 * standards-compliant assignment, override behavior, and value propagation according to SVG 2 specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting `fill-rule` attribute, supporting
 * appropriate types and `null` for attribute removal, to maintain consistent output across different rendering
 * configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of `fill-rule` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for `fill-rule` attribute.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FillRuleProvider
{
    /**
     * Provides test cases for SVG `fill-rule` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of SVG `fill-rule` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `fill-rule` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(FillRule::class, 'fill-rule');

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
                "Should return an empty string when attribute is set to 'null'.",
            ],
            'replace existing' => [
                'nonzero',
                ['fill-rule' => 'evenodd'],
                'nonzero',
                ' fill-rule="nonzero"',
                "Should return new 'fill-rule' after replacing existing 'fill-rule' attribute.",
            ],
            'string' => [
                'nonzero',
                [],
                'nonzero',
                ' fill-rule="nonzero"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['fill-rule' => 'nonzero'],
                '',
                '',
                "Should unset the 'fill-rule' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
