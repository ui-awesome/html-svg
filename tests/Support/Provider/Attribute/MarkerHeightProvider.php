<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasMarkerHeightTest}.
 *
 * Provides representative input/output pairs for testing the `d` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MarkerHeightProvider
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
                3.5,
                [],
                3.5,
                ' markerHeight="3.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                3,
                [],
                3,
                ' markerHeight="3"',
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
                ['markerHeight' => '3'],
                '5',
                ' markerHeight="5"',
                "Should return new 'markerHeight' after replacing the existing 'markerHeight' attribute.",
            ],
            'string' => [
                '3',
                [],
                '3',
                ' markerHeight="3"',
                'Should return the attribute value after setting it.',
            ],
            'string percentage' => [
                '10%',
                [],
                '10%',
                ' markerHeight="10%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '4em',
                [],
                '4em',
                ' markerHeight="4em"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['markerHeight' => '3'],
                '',
                '',
                "Should unset the 'markerHeight' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
