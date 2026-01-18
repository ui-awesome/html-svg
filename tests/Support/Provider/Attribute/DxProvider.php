<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasDxTest}.
 *
 * Provides representative input/output pairs for testing the `dx` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DxProvider
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
                ' dx="5.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' dx="10"',
                'Should return the attribute value after setting it.',
            ],
            'negative integer' => [
                -5,
                [],
                -5,
                ' dx="-5"',
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
                ['dx' => '10'],
                '20',
                ' dx="20"',
                "Should return new 'dx' after replacing the existing 'dx' attribute.",
            ],
            'string' => [
                '15',
                [],
                '15',
                ' dx="15"',
                'Should return the attribute value after setting it.',
            ],
            'string space-separated list' => [
                '1 2 3',
                [],
                '1 2 3',
                ' dx="1 2 3"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '10px',
                [],
                '10px',
                ' dx="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['dx' => '10'],
                '',
                '',
                "Should unset the 'dx' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
