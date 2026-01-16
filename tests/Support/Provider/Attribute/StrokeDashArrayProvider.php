<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeDashArrayTest}.
 *
 * Supplies test data for validating the SVG `strokedasharray` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeDashArrayProvider
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
                3.5,
                [],
                3.5,
                ' stroke-dasharray="3.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                3,
                [],
                3,
                ' stroke-dasharray="3"',
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
                '1.5em',
                ['stroke-dasharray' => '2'],
                '1.5em',
                ' stroke-dasharray="1.5em"',
                "Should return new 'stroke-dasharray' after replacing the existing 'stroke-dasharray' attribute.",
            ],
            'string' => [
                '1.5em',
                [],
                '1.5em',
                ' stroke-dasharray="1.5em"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-dasharray' => '2'],
                '',
                '',
                "Should unset the 'stroke-dasharray' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
