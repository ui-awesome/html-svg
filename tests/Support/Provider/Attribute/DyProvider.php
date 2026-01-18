<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasDyTest}.
 *
 * Provides representative input/output pairs for testing the `dy` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DyProvider
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
                ' dy="5.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' dy="10"',
                'Should return the attribute value after setting it.',
            ],
            'negative integer' => [
                -5,
                [],
                -5,
                ' dy="-5"',
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
                ['dy' => '10'],
                '20',
                ' dy="20"',
                "Should return new 'dy' after replacing the existing 'dy' attribute.",
            ],
            'string' => [
                '15',
                [],
                '15',
                ' dy="15"',
                'Should return the attribute value after setting it.',
            ],
            'string space-separated list' => [
                '1 2 3',
                [],
                '1 2 3',
                ' dy="1 2 3"',
                'Should return the attribute value after setting it.',
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' dy="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '10px',
                [],
                '10px',
                ' dy="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['dy' => '10'],
                '',
                '',
                "Should unset the 'dy' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
