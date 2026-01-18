<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStopOpacityTest}.
 *
 * Provides representative input/output pairs for testing the `stopOpacity` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StopOpacityProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'float' => [
                0.5,
                [],
                0.5,
                ' stop-opacity="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                1,
                [],
                1,
                ' stop-opacity="1"',
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
                '0.5',
                ['stop-opacity' => '0.8'],
                '0.5',
                ' stop-opacity="0.5"',
                "Should return new 'stop-opacity' after replacing the existing 'stop-opacity' attribute.",
            ],
            'string' => [
                '0',
                [],
                '0',
                ' stop-opacity="0"',
                'Should return the attribute value after setting it.',
            ],
            'string float' => [
                '0.5',
                [],
                '0.5',
                ' stop-opacity="0.5"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stop-opacity' => '0.5'],
                '',
                '',
                "Should unset the 'stop-opacity' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
