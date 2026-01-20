<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Svg\Values\CoordinateUnits;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasPatternUnitsTest}.
 *
 * Provides representative input/output pairs for testing the `patternUnits` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PatternUnitsProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(CoordinateUnits::class, 'patternUnits');

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
                ['patternUnits' => 'objectBoundingBox'],
                'userSpaceOnUse',
                ' patternUnits="userSpaceOnUse"',
                "Should return new 'patternUnits' after replacing the existing 'patternUnits' attribute.",
            ],
            'string' => [
                'objectBoundingBox',
                [],
                'objectBoundingBox',
                ' patternUnits="objectBoundingBox"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['patternUnits' => 'objectBoundingBox'],
                '',
                '',
                "Should unset the 'patternUnits' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
