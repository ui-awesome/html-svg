<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Svg\Values\StrokeLineJoin;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeLineJoinTest}.
 *
 * Supplies test data for validating the SVG `stroke-linejoin` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeLineJoinProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(StrokeLineJoin::class, 'stroke-linejoin');

        $staticCases = [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                'miter',
                ['stroke-linejoin' => 'round'],
                'miter',
                ' stroke-linejoin="miter"',
                "Should return new 'stroke-linejoin' after replacing the existing 'stroke-linejoin' attribute.",
            ],
            'string' => [
                'miter',
                [],
                'miter',
                ' stroke-linejoin="miter"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-linejoin' => 'miter'],
                '',
                '',
                "Should unset the 'stroke-linejoin' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
