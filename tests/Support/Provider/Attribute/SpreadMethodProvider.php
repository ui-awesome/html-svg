<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\SpreadMethod;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasSpreadMethodTest}.
 *
 * Provides representative input/output pairs for testing the `spreadMethod` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class SpreadMethodProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(SpreadMethod::class, 'spreadMethod');

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
                'pad',
                ['spreadMethod' => 'reflect'],
                'pad',
                ' spreadMethod="pad"',
                "Should return new 'spreadMethod' after replacing the existing 'spreadMethod' attribute.",
            ],
            'string' => [
                'pad',
                [],
                'pad',
                ' spreadMethod="pad"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['spreadMethod' => 'pad'],
                '',
                '',
                "Should unset the 'spreadMethod' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
