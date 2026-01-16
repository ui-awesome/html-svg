<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use UIAwesome\Html\Svg\Tests\Support\EnumDataGenerator;
use UIAwesome\Html\Svg\Values\{SvgAttribute, WritingMode};
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasWritingModeTest}.
 *
 * Supplies test data for validating the SVG `writing-mode` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */

final class WritingModeProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataGenerator::cases(WritingMode::class, SvgAttribute::WRITING_MODE);

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
                'horizontal-tb',
                ['writing-mode' => 'vertical-rl'],
                'horizontal-tb',
                ' writing-mode="horizontal-tb"',
                "Should return new 'writing-mode' after replacing the existing 'writing-mode' attribute.",
            ],
            'string' => [
                'vertical-rl',
                [],
                'vertical-rl',
                ' writing-mode="vertical-rl"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['writing-mode' => 'horizontal-tb'],
                '',
                '',
                "Should unset the 'writing-mode' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
