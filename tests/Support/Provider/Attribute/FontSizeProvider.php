<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFontSizeTest}.
 *
 * Provides representative input/output pairs for testing the `font-size` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FontSizeProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
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
            'float' => [
                5.5,
                [],
                5.5,
                ' font-size="5.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' font-size="10"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '20',
                ['font-size' => '10'],
                '20',
                ' font-size="20"',
                "Should return new 'font-size' after replacing the existing 'font-size' attribute.",
            ],
            'string' => [
                '15',
                [],
                '15',
                ' font-size="15"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['font-size' => '10'],
                '',
                '',
                "Should unset the 'font-size' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
