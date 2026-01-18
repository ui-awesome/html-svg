<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFontWeightTest}.
 *
 * Provides representative input/output pairs for testing the `font-weight` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FontWeightProvider
{
    /**
     * @phpstan-return array<string, array{int|string|null, mixed[], int|string, string, string}>
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
            'integer' => [
                700,
                [],
                700,
                ' font-weight="700"',
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
                700,
                ['font-weight' => '400'],
                700,
                ' font-weight="700"',
                "Should return new 'font-weight' after replacing the existing 'font-weight' attribute.",
            ],
            'string' => [
                'normal',
                [],
                'normal',
                ' font-weight="normal"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['font-weight' => '700'],
                '',
                '',
                "Should unset the 'font-weight' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
