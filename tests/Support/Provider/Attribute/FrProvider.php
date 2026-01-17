<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFrTest}.
 *
 * Supplies test data for validating the SVG `fr` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FrProvider
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
                25.5,
                [],
                25.5,
                ' fr="25.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                50,
                [],
                50,
                ' fr="50"',
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
                30,
                ['fr' => 25],
                30,
                ' fr="30"',
                "Should return new 'fr' after replacing the existing 'fr' attribute.",
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' fr="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '10px',
                [],
                '10px',
                ' fr="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['fr' => 50],
                '',
                '',
                "Should unset the 'fr' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
