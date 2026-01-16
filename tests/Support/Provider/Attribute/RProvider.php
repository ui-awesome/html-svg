<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasRTest}.
 *
 * Supplies test data for validating the SVG `r` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RProvider
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
                25.5,
                [],
                25.5,
                ' r="25.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                50,
                [],
                50,
                ' r="50"',
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
                30,
                ['r' => 25],
                30,
                ' r="30"',
                "Should return new 'r' after replacing the existing 'r' attribute.",
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' r="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '10px',
                [],
                '10px',
                ' r="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['r' => 50],
                '',
                '',
                "Should unset the 'r' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
