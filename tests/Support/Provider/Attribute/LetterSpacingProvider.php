<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasLetterSpacingTest}.
 *
 * Supplies test data for validating the SVG `letter-spacing` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class LetterSpacingProvider
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
                5.5,
                [],
                5.5,
                ' letter-spacing="5.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' letter-spacing="10"',
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
                '20',
                ['letter-spacing' => '10'],
                '20',
                ' letter-spacing="20"',
                "Should return new 'letter-spacing' after replacing the existing 'letter-spacing' attribute.",
            ],
            'string' => [
                '15',
                [],
                '15',
                ' letter-spacing="15"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['letter-spacing' => '10'],
                '',
                '',
                "Should unset the 'letter-spacing' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
