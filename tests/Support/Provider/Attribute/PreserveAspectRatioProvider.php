<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\PreserveAspectRatio;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasPreserveAspectRatioTest}.
 *
 * Supplies test data for validating the SVG `preserveAspectRatio` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PreserveAspectRatioProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(PreserveAspectRatio::class, 'preserveAspectRatio');

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
                'xMaxYMax slice',
                ['preserveAspectRatio' => 'xMinYMin meet'],
                'xMaxYMax slice',
                ' preserveAspectRatio="xMaxYMax slice"',
                "Should return new 'preserveAspectRatio' after replacing the existing 'preserveAspectRatio' attribute.",
            ],
            'string' => [
                'xMidYMid meet',
                [],
                'xMidYMid meet',
                ' preserveAspectRatio="xMidYMid meet"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['preserveAspectRatio' => 'xMidYMid meet'],
                '',
                '',
                "Should unset the 'preserveAspectRatio' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
