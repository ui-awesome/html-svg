<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Svg\Values\{SvgAttribute, TextAnchor};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasTextAnchorTest}.
 *
 * Provides representative input/output pairs for testing the `text-anchor` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TextAnchorProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(TextAnchor::class, SvgAttribute::TEXT_ANCHOR);

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
                'start',
                ['text-anchor' => 'middle'],
                'start',
                ' text-anchor="start"',
                "Should return new 'text-anchor' after replacing the existing 'text-anchor' attribute.",
            ],
            'string' => [
                'middle',
                [],
                'middle',
                ' text-anchor="middle"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['text-anchor' => 'end'],
                '',
                '',
                "Should unset the 'text-anchor' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
