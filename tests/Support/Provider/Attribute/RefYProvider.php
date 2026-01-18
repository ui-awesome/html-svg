<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasRefYTest}.
 *
 * Provides representative input/output pairs for testing the `refY` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RefYProvider
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
                2.5,
                [],
                2.5,
                ' refY="2.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                0,
                [],
                0,
                ' refY="0"',
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
                '5',
                ['refY' => '0'],
                '5',
                ' refY="5"',
                "Should return new 'refY' after replacing the existing 'refY' attribute.",
            ],
            'string' => [
                '0',
                [],
                '0',
                ' refY="0"',
                'Should return the attribute value after setting it.',
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' refY="50%"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['refY' => '0'],
                '',
                '',
                "Should unset the 'refY' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
