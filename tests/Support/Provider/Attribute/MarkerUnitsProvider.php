<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Svg\Values\MarkerUnits;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasMarkerUnitsTest}.
 *
 * Provides representative input/output pairs for testing the `markerUnits` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MarkerUnitsProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(MarkerUnits::class, 'markerUnits');

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
                ['markerUnits' => 'strokeWidth'],
                'userSpaceOnUse',
                ' markerUnits="userSpaceOnUse"',
                "Should return new 'markerUnits' after replacing the existing 'markerUnits' attribute.",
            ],
            'string' => [
                'strokeWidth',
                [],
                'strokeWidth',
                ' markerUnits="strokeWidth"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['markerUnits' => 'strokeWidth'],
                '',
                '',
                "Should unset the 'markerUnits' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
