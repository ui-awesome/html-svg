<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasY2Test}.
 *
 * Supplies test data for validating the SVG `y2` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class Y2Provider
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
                10.3,
                [],
                10.3,
                ' y2="10.3"',
                'Should return the attribute value after setting it.',
            ],
            'float negative' => [
                -5.7,
                [],
                -5.7,
                ' y2="-5.7"',
                'Should return the attribute value after setting it.',
            ],
            'float precision' => [
                10.12345,
                [],
                10.12345,
                ' y2="10.12345"',
                'Should return the attribute value after setting it.',
            ],
            'float zero' => [
                0.0,
                [],
                0.0,
                ' y2="0"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                10,
                [],
                10,
                ' y2="10"',
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
                '75',
                ['y2' => '50'],
                '75',
                ' y2="75"',
                "Should return new 'y2' after replacing the existing 'y2' attribute.",
            ],
            'string' => [
                '100',
                [],
                '100',
                ' y2="100"',
                'Should return the attribute value after setting it.',
            ],
            'string percentage' => [
                '50%',
                [],
                '50%',
                ' y2="50%"',
                'Should return the attribute value after setting it.',
            ],
            'string with unit' => [
                '10px',
                [],
                '10px',
                ' y2="10px"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['y2' => '100'],
                '',
                '',
                "Should unset the 'y2' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
