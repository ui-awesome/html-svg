<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\Orient;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasOrientTest}.
 *
 * Provides representative input/output pairs for testing the `orient` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class OrientProvider
{
    /**
     * @phpstan-return array<
     *   string,
     *   array{float|int|string|null|UnitEnum, mixed[], float|int|string|UnitEnum, string, string},
     * >
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(Orient::class, 'orient');

        $staticCases = [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'float' => [
                45.5,
                [],
                45.5,
                ' orient="45.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                90,
                [],
                90,
                ' orient="90"',
                'Should return the attribute value after setting it.',
            ],
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '180',
                ['orient' => 'auto'],
                '180',
                ' orient="180"',
                "Should return new 'orient' after replacing the existing 'orient' attribute.",
            ],
            'string' => [
                '45',
                [],
                '45',
                ' orient="45"',
                'Should return the attribute value after setting it.',
            ],
            'string auto keyword' => [
                'auto',
                [],
                'auto',
                ' orient="auto"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '90deg',
                [],
                '90deg',
                ' orient="90deg"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['orient' => 'auto'],
                '',
                '',
                "Should unset the 'orient' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
