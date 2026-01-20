<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

use PHPForge\Support\EnumDataProvider;
use UIAwesome\Html\Svg\Values\MaskType;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasMaskTypeTest}.
 *
 * Provides representative input/output pairs for testing the `mask-type` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class MaskTypeProvider
{
    /**
     * @phpstan-return array<string, array{string|null|UnitEnum, mixed[], string|UnitEnum, string, string}>
     */
    public static function values(): array
    {
        $enumCases = EnumDataProvider::attributeCases(MaskType::class, 'mask-type');

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
                'alpha',
                ['mask-type' => 'luminance'],
                'alpha',
                ' mask-type="alpha"',
                "Should return new 'mask-type' after replacing the existing 'mask-type' attribute.",
            ],
            'string' => [
                'luminance',
                [],
                'luminance',
                ' mask-type="luminance"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['mask-type' => 'luminance'],
                '',
                '',
                "Should unset the 'mask-type' attribute when 'null' is provided after a value.",
            ],
        ];

        return [...$staticCases, ...$enumCases];
    }
}
