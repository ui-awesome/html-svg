<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeWidthTest}.
 *
 * Supplies test data for validating the SVG `stroke-width` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeWidthProvider
{
    /**
     * @phpstan-return array<string, array{int|string|null, mixed[], int|string, string, string}>
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
            'integer' => [
                3,
                [],
                3,
                ' stroke-width="3"',
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
                '1.5em',
                ['stroke-width' => '2'],
                '1.5em',
                ' stroke-width="1.5em"',
                "Should return new 'stroke-width' after replacing the existing 'stroke-width' attribute.",
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' stroke-width="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '1.5em',
                [],
                '1.5em',
                ' stroke-width="1.5em"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-width' => '2'],
                '',
                '',
                "Should unset the 'stroke-width' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
