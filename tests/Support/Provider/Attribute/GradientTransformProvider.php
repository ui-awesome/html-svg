<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasGradientTransformTest}.
 *
 * Supplies test data for validating the SVG `gradientTransform` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class GradientTransformProvider
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
                ['gradientTransform' => 'rotate(30)'],
                'rotate(45)',
                ' gradientTransform="rotate(45)"',
                "Should return new 'gradientTransform' after replacing the existing 'gradientTransform' attribute.",
            ],
            'string' => [
                'rotate(45)',
                [],
                'rotate(45)',
                ' gradientTransform="rotate(45)"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['gradientTransform' => 'rotate(30)'],
                '',
                '',
                "Should unset the 'gradientTransform' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
