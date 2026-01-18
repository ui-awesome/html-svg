<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFontFamilyTest}.
 *
 * Provides representative input/output pairs for testing the `font-family` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FontFamilyProvider
{
    /**
     * @phpstan-return array<string, array{string|null, mixed[], string, string, string}>
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
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'Arial',
                ['font-family' => 'Verdana'],
                'Arial',
                ' font-family="Arial"',
                "Should return new 'font-family' after replacing the existing 'font-family' attribute.",
            ],
            'string' => [
                'Arial',
                [],
                'Arial',
                ' font-family="Arial"',
                'Should return the attribute value after setting it.',
            ],
            'string with lists of names' => [
                'Arial, sans-serif',
                [],
                'Arial, sans-serif',
                ' font-family="Arial, sans-serif"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['font-family' => 'Arial'],
                '',
                '',
                "Should unset the 'font-family' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
