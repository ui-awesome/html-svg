<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\FillRule;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFillRuleTest}.
 *
 * Supplies test data for validating the SVG `fill-rule` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FillRuleProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(FillRule::class, 'fill-rule');

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
                "Should return an empty string when attribute is set to 'null'.",
            ],
            'replace existing' => [
                'nonzero',
                ['fill-rule' => 'evenodd'],
                'nonzero',
                ' fill-rule="nonzero"',
                "Should return new 'fill-rule' after replacing existing 'fill-rule' attribute.",
            ],
            'string' => [
                'nonzero',
                [],
                'nonzero',
                ' fill-rule="nonzero"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['fill-rule' => 'nonzero'],
                '',
                '',
                "Should unset the 'fill-rule' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
