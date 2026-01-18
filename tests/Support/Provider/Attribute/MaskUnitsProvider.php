<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\CoordinateUnits;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasMaskUnitsTest}.
 *
 * Provides representative input/output pairs for testing the `maskUnits` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MaskUnitsProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(CoordinateUnits::class, 'maskUnits');

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
                ['maskUnits' => 'objectBoundingBox'],
                'userSpaceOnUse',
                ' maskUnits="userSpaceOnUse"',
                "Should return new 'maskUnits' after replacing the existing 'maskUnits' attribute.",
            ],
            'string' => [
                'objectBoundingBox',
                [],
                'objectBoundingBox',
                ' maskUnits="objectBoundingBox"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['maskUnits' => 'objectBoundingBox'],
                '',
                '',
                "Should unset the 'maskUnits' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
