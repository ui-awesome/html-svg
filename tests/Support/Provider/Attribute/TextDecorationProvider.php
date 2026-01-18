<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\{SvgAttribute, TextDecorationLine, TextDecorationStyle};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasTextDecorationTest}.
 *
 * Provides representative input/output pairs for testing the `text-decoration` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TextDecorationProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = [
            ...EnumDataGenerator::cases(TextDecorationLine::class, SvgAttribute::TEXT_DECORATION),
            ...EnumDataGenerator::cases(TextDecorationStyle::class, SvgAttribute::TEXT_DECORATION),
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
