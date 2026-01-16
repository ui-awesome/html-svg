<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasRefXTest}.
 *
 * Supplies test data for validating the SVG `refX` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class RefXProvider
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
                ' refX="2.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                0,
                [],
                0,
                ' refX="0"',
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
                ['refX' => '0'],
                '5',
                ' refX="5"',
                "Should return new 'refX' after replacing the existing 'refX' attribute.",
            ],
            'string' => [
                '0',
                [],
                '0',
                ' refX="0"',
                'Should return the attribute value after setting it.',
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' refX="50%"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['refX' => '0'],
                '',
                '',
                "Should unset the 'refX' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
