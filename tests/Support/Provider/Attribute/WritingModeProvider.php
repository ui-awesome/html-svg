<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\{SvgAttribute, WritingMode};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasWritingModeTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `writing-mode` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `writing-mode` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `writing-mode` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `writing-mode` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */

final class WritingModeProvider
{
    /**
     * Provides test cases for SVG `writing-mode` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `writing-mode` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `writing-mode` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(WritingMode::class, SvgAttribute::WRITING_MODE);

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
                'horizontal-tb',
                ['writing-mode' => 'vertical-rl'],
                'horizontal-tb',
                ' writing-mode="horizontal-tb"',
                "Should return new 'writing-mode' after replacing the existing 'writing-mode' attribute.",
            ],
            'string' => [
                'vertical-rl',
                [],
                'vertical-rl',
                ' writing-mode="vertical-rl"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['writing-mode' => 'horizontal-tb'],
                '',
                '',
                "Should unset the 'writing-mode' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
