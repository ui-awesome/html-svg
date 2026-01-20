<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Svg\Values\CoordinateUnits;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasGradientUnitsTest}.
 *
 * Provides representative input/output pairs for testing the `gradientUnits` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class GradientUnitsProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(CoordinateUnits::class, 'gradientUnits');

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
                'userSpaceOnUse',
                ['gradientUnits' => 'objectBoundingBox'],
                'userSpaceOnUse',
                ' gradientUnits="userSpaceOnUse"',
                "Should return new 'gradientUnits' after replacing the existing 'gradientUnits' attribute.",
            ],
            'string' => [
                'userSpaceOnUse',
                [],
                'userSpaceOnUse',
                ' gradientUnits="userSpaceOnUse"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['gradientUnits' => 'userSpaceOnUse'],
                '',
                '',
                "Should unset the 'gradientUnits' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
