<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\{FontStyle, SvgAttribute};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFontStyleTest}.
 *
 * Supplies test data for validating the SVG `font-style` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FontStyleProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(FontStyle::class, SvgAttribute::FONT_STYLE);

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
                'normal',
                ['font-style' => 'italic'],
                'normal',
                ' font-style="normal"',
                "Should return new 'font-style' after replacing the existing 'font-style' attribute.",
            ],
            'string' => [
                'italic',
                [],
                'italic',
                ' font-style="italic"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['font-style' => 'normal'],
                '',
                '',
                "Should unset the 'font-style' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
