<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasTransformTest}.
 *
 * Supplies test data for validating the SVG `transform` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class TransformProvider
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
                'rotate(45)',
                ['transform' => 'rotate(30)'],
                'rotate(45)',
                ' transform="rotate(45)"',
                "Should return new 'transform' after replacing the existing 'transform' attribute.",
            ],
            'string' => [
                'rotate(45)',
                [],
                'rotate(45)',
                ' transform="rotate(45)"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['transform' => 'rotate(30)'],
                '',
                '',
                "Should unset the 'transform' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
