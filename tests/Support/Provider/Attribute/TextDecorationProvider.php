<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\{SvgAttribute, TextDecorationLine, TextDecorationStyle};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasTextDecorationTest} class.
 *
 * Supplies comprehensive test data for validating the handling of the SVG `text-decoration` attribute in tag rendering,
 * ensuring standards-compliant assignment, override behavior, and value propagation according to the SVG 2
 * specification.
 *
 * The test data covers real-world scenarios for setting, overriding, and unsetting the `text-decoration` attribute,
 * supporting appropriate types and `null` for attribute removal, to maintain consistent output across different
 * rendering configurations.
 *
 * The provider organizes test cases with descriptive names for clear identification of failure cases during test
 * execution and debugging sessions.
 *
 * Key features.
 * - Ensures correct propagation, override, and removal of the `text-decoration` attribute in SVG element rendering.
 * - Named test data sets for precise failure identification.
 * - Validation of appropriate types and `null` for the `text-decoration` attribute.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TextDecorationProvider
{
    /**
     * Provides test cases for SVG `text-decoration` attribute scenarios.
     *
     * Supplies test data for validating assignment, override, and removal of the SVG `text-decoration` attribute.
     *
     * Each test case includes the input value, the initial attributes, the expected value, the expected rendered
     * attribute string, and an assertion message for clear identification.
     *
     * @return array Test data for `text-decoration` attribute scenarios.
     *
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = [
            ... EnumDataGenerator::cases(TextDecorationLine::class, SvgAttribute::TEXT_DECORATION),
            ... EnumDataGenerator::cases(TextDecorationStyle::class, SvgAttribute::TEXT_DECORATION),
        ];

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
                'underline',
                ['text-decoration' => 'none'],
                'underline',
                ' text-decoration="underline"',
                "Should return new 'text-decoration' after replacing the existing 'text-decoration' attribute.",
            ],
            'string' => [
                'underline',
                [],
                'underline',
                ' text-decoration="underline"',
                'Should return the attribute value after setting it.',
            ],
            'string blink' => [
                'blink',
                [],
                'blink',
                ' text-decoration="blink"',
                'Should return the attribute value after setting it.',
            ],
            'string grammar-error' => [
                'grammar-error',
                [],
                'grammar-error',
                ' text-decoration="grammar-error"',
                'Should return the attribute value after setting it.',
            ],
            'string multiple values' => [
                'underline overline',
                [],
                'underline overline',
                ' text-decoration="underline overline"',
                'Should return the attribute value after setting it.',
            ],
            'string spelling-error' => [
                'spelling-error',
                [],
                'spelling-error',
                ' text-decoration="spelling-error"',
                'Should return the attribute value after setting it.',
            ],
            'string triple values' => [
                'underline overline line-through',
                [],
                'underline overline line-through',
                ' text-decoration="underline overline line-through"',
                'Should return the attribute value after setting it.',
            ],
            'string with style' => [
                'underline wavy',
                [],
                'underline wavy',
                ' text-decoration="underline wavy"',
                'Should return the attribute value after setting it.',
            ],
            'string with style and color' => [
                'underline wavy red',
                [],
                'underline wavy red',
                ' text-decoration="underline wavy red"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['text-decoration' => 'underline'],
                '',
                '',
                "Should unset the 'text-decoration' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
