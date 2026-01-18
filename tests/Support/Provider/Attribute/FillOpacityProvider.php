<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFillOpacityTest}.
 *
 * Provides representative input/output pairs for testing the `fill-opacity` attribute functionality.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FillOpacityProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'float' => [
                0.5,
                [],
                0.5,
                ' fill-opacity="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                1,
                [],
                1,
                ' fill-opacity="1"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when attribute is set to 'null'.",
            ],
            'replace existing' => [
                '0.5',
                ['fill-opacity' => '0.8'],
                '0.5',
                ' fill-opacity="0.5"',
                "Should return new 'fill-opacity' after replacing existing 'fill-opacity' attribute.",
            ],
            'string' => [
                '0',
                [],
                '0',
                ' fill-opacity="0"',
                'Should return the attribute value after setting it.',
            ],
            'string float' => [
                '0.5',
                [],
                '0.5',
                ' fill-opacity="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['fill-opacity' => '0.5'],
                '',
                '',
                "Should unset the 'fill-opacity' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
