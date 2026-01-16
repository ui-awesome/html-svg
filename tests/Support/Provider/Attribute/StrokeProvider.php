<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeTest}.
 *
 * Supplies test data for validating the SVG `stroke` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeProvider
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
                ['stroke' => 'blue'],
                'red',
                ' stroke="red"',
                "Should return new 'stroke' after replacing the existing 'stroke' attribute.",
            ],
            'string color' => [
                'red',
                [],
                'red',
                ' stroke="red"',
                'Should return the attribute value after setting it.',
            ],
            'string gradient' => [
                'url(#gradient1)',
                [],
                'url(#gradient1)',
                ' stroke="url(#gradient1)"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke' => 'red'],
                '',
                '',
                "Should unset the 'stroke' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
