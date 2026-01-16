<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeOpacityTest}.
 *
 * Supplies test data for validating the SVG `stroke-opacity` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeOpacityProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'float' => [
                0.8,
                [],
                0.8,
                ' stroke-opacity="0.8"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                1,
                [],
                1,
                ' stroke-opacity="1"',
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
                0.8,
                ['stroke-opacity' => '0.5'],
                0.8,
                ' stroke-opacity="0.8"',
                "Should return new 'stroke-opacity' after replacing existing 'stroke-opacity' attribute.",
            ],
            'string' => [
                '0',
                [],
                '0',
                ' stroke-opacity="0"',
                'Should return the attribute value after setting it.',
            ],
            'string float' => [
                '0.5',
                [],
                '0.5',
                ' stroke-opacity="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-opacity' => '0.5'],
                '',
                '',
                "Should unset the 'stroke-opacity' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
