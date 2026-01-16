<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasFillTest}.
 *
 * Supplies test data for validating the SVG `fill` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class FillProvider
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
                'red',
                ['fill' => 'blue'],
                'red',
                ' fill="red"',
                "Should return new 'fill' after replacing the existing 'fill' attribute.",
            ],
            'string color' => [
                'red',
                [],
                'red',
                ' fill="red"',
                'Should return the attribute value after setting it.',
            ],
            'string gradient' => [
                'url(#gradient1)',
                [],
                'url(#gradient1)',
                ' fill="url(#gradient1)"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['fill' => 'red'],
                '',
                '',
                "Should unset the 'fill' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
