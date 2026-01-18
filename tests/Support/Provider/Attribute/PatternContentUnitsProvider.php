<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\CoordinateUnits;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasPatternContentUnitsTest}.
 *
 * Provides representative input/output pairs for testing the `patternContentUnits` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PatternContentUnitsProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(CoordinateUnits::class, 'patternContentUnits');

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
                'objectBoundingBox',
                ['patternContentUnits' => 'userSpaceOnUse'],
                'objectBoundingBox',
                ' patternContentUnits="objectBoundingBox"',
                "Should return new 'patternContentUnits' after replacing the existing 'patternContentUnits' attribute.",
            ],
            'string' => [
                'userSpaceOnUse',
                [],
                'userSpaceOnUse',
                ' patternContentUnits="userSpaceOnUse"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['patternContentUnits' => 'userSpaceOnUse'],
                '',
                '',
                "Should unset the 'patternContentUnits' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
