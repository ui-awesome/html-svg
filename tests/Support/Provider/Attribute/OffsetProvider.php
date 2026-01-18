<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasOffsetTest}.
 *
 * Provides representative input/output pairs for testing the `offset` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class OffsetProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'float' => [
                0.25,
                [],
                0.25,
                ' offset="0.25"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                1,
                [],
                1,
                ' offset="1"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'percentage lower bound' => [
                '0%',
                [],
                '0%',
                ' offset="0%"',
                'Should return the attribute value after setting it.',
            ],
            'percentage middle' => [
                '50%',
                [],
                '50%',
                ' offset="50%"',
                'Should return the attribute value after setting it.',
            ],
            'percentage upper bound' => [
                '100%',
                [],
                '100%',
                ' offset="100%"',
                'Should return the attribute value after setting it.',
            ],
            'replace existing' => [
                '0.5',
                ['offset' => '0.8'],
                '0.5',
                ' offset="0.5"',
                "Should return new 'offset' after replacing the existing 'offset' attribute.",
            ],
            'string' => [
                '0',
                [],
                '0',
                ' offset="0"',
                'Should return the attribute value after setting it.',
            ],
            'string float' => [
                '0.5',
                [],
                '0.5',
                ' offset="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['offset' => '0.5'],
                '',
                '',
                "Should unset the 'offset' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
