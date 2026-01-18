<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStopColorTest}.
 *
 * Provides representative input/output pairs for testing the `stopColor` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StopColorProvider
{
    /**
     * @phpstan-return array<string, array{string|null, mixed[], string, string, string}>
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
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when the attribute is set to 'null'.",
            ],
            'replace existing' => [
                '#fff',
                ['stop-color' => '#000'],
                '#fff',
                ' stop-color="#fff"',
                "Should return new 'stop-color' after replacing the existing 'stop-color' attribute.",
            ],
            'string color' => [
                '#ff0000',
                [],
                '#ff0000',
                ' stop-color="#ff0000"',
                'Should return the attribute value after setting it.',
            ],
            'string currentColor' => [
                'currentColor',
                [],
                'currentColor',
                ' stop-color="currentColor"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stop-color' => '#fff'],
                '',
                '',
                "Should unset the 'stop-color' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
