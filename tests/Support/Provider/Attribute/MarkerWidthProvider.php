<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasMarkerWidthTest}.
 *
 * Supplies test data for validating the SVG `markerWidth` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MarkerWidthProvider
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
                ' markerWidth="3.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                3,
                [],
                3,
                ' markerWidth="3"',
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
                ['markerWidth' => '3'],
                '5',
                ' markerWidth="5"',
                "Should return new 'markerWidth' after replacing the existing 'markerWidth' attribute.",
            ],
            'string' => [
                '3',
                [],
                '3',
                ' markerWidth="3"',
                'Should return the attribute value after setting it.',
            ],
            'string percentage' => [
                '10%',
                [],
                '10%',
                ' markerWidth="10%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '1.5em',
                [],
                '1.5em',
                ' markerWidth="1.5em"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['markerWidth' => '3'],
                '',
                '',
                "Should unset the 'markerWidth' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
