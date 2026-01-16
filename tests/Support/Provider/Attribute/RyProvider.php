<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasRyTest}.
 *
 * Supplies test data for validating the SVG `ry` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RyProvider
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
                50.5,
                [],
                50.5,
                ' ry="50.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                100,
                [],
                100,
                ' ry="100"',
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
                75,
                ['ry' => 50],
                75,
                ' ry="75"',
                "Should return new 'ry' after replacing the existing 'ry' attribute.",
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' ry="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '10px',
                [],
                '10px',
                ' ry="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['ry' => 100],
                '',
                '',
                "Should unset the 'ry' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
