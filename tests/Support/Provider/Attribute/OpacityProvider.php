<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasOpacityTest}.
 *
 * Supplies test data for validating the SVG `opacity` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class OpacityProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'float' => [
                0.3,
                [],
                0.3,
                ' opacity="0.3"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                1,
                [],
                1,
                ' opacity="1"',
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
                '0.5',
                ['opacity' => '1'],
                '0.5',
                ' opacity="0.5"',
                "Should return new 'opacity' after replacing the existing 'opacity' attribute.",
            ],
            'string' => [
                '0',
                [],
                '0',
                ' opacity="0"',
                'Should return the attribute value after setting it.',
            ],
            'string float' => [
                '0.5',
                [],
                '0.5',
                ' opacity="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['opacity' => '1'],
                '',
                '',
                "Should unset the 'opacity' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
