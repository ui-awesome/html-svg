<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\{LengthAdjust, SvgAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasLengthAdjustTest}.
 *
 * Supplies test data for validating the SVG `lengthAdjust` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class LengthAdjustProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(LengthAdjust::class, SvgAttribute::LENGTH_ADJUST);

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
                'spacing',
                ['lengthAdjust' => 'spacingAndGlyphs'],
                'spacing',
                ' lengthAdjust="spacing"',
                "Should return new 'lengthAdjust' after replacing the existing 'lengthAdjust' attribute.",
            ],
            'string' => [
                'spacing',
                [],
                'spacing',
                ' lengthAdjust="spacing"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['lengthAdjust' => 'spacing'],
                '',
                '',
                "Should unset the 'lengthAdjust' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
