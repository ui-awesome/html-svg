<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasCxTest}.
 *
 * Supplies test data for validating the SVG `cx` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class CxProvider
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
                ' cx="50.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                100,
                [],
                100,
                ' cx="100"',
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
                ['cx' => 50],
                75,
                ' cx="75"',
                "Should return new 'cx' after replacing the existing 'cx' attribute.",
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' cx="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '10px',
                [],
                '10px',
                ' cx="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['cx' => 100],
                '',
                '',
                "Should unset the 'cx' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
