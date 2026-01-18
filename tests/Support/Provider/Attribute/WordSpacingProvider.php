<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasWordSpacingTest}.
 *
 * Provides representative input/output pairs for testing the `word-spacing` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class WordSpacingProvider
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
                ' word-spacing="5.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' word-spacing="10"',
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
                ['word-spacing' => '10'],
                '20',
                ' word-spacing="20"',
                "Should return new 'word-spacing' after replacing the existing 'word-spacing' attribute.",
            ],
            'string' => [
                '15',
                [],
                '15',
                ' word-spacing="15"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['word-spacing' => '10'],
                '',
                '',
                "Should unset the 'word-spacing' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
