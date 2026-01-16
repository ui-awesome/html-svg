<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\CoordinateUnits;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasMaskContentUnitsTest}.
 *
 * Supplies test data for validating the SVG `maskContentUnits` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MaskContentUnitsProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(CoordinateUnits::class, 'maskContentUnits');

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
                ['maskContentUnits' => 'userSpaceOnUse'],
                'objectBoundingBox',
                ' maskContentUnits="objectBoundingBox"',
                "Should return new 'maskContentUnits' after replacing the existing 'maskContentUnits' attribute.",
            ],
            'string' => [
                'userSpaceOnUse',
                [],
                'userSpaceOnUse',
                ' maskContentUnits="userSpaceOnUse"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['maskContentUnits' => 'userSpaceOnUse'],
                '',
                '',
                "Should unset the 'maskContentUnits' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
