<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFxTest}.
 *
 * Provides representative input/output pairs for testing the `fx` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FxProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'empty string' => [
                '',
                [],
                '',
                '',
                'Should return an empty string when setting an empty string.',
            ],
            'float' => [
                50.5,
                [],
                50.5,
                ' fx="50.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                100,
                [],
                100,
                ' fx="100"',
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
                75,
                ['fx' => 50],
                75,
                ' fx="75"',
                "Should return new 'fx' after replacing the existing 'fx' attribute.",
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' fx="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '10px',
                [],
                '10px',
                ' fx="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['fx' => 100],
                '',
                '',
                "Should unset the 'fx' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
