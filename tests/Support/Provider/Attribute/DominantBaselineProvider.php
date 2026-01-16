<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\{DominantBaseline, SvgAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasDominantBaselineTest}.
 *
 * Supplies test data for validating the SVG `dominant-baseline` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class DominantBaselineProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(DominantBaseline::class, SvgAttribute::DOMINANT_BASELINE);

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
                'auto',
                ['dominant-baseline' => 'middle'],
                'auto',
                ' dominant-baseline="auto"',
                "Should return new 'dominant-baseline' after replacing the existing 'dominant-baseline' attribute.",
            ],
            'string' => [
                'middle',
                [],
                'middle',
                ' dominant-baseline="middle"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['dominant-baseline' => 'auto'],
                '',
                '',
                "Should unset the 'dominant-baseline' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
