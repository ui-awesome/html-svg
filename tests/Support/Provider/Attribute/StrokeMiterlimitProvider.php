<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasStrokeMiterlimitTest}.
 *
 * Provides representative input/output pairs for testing the `stroke-miterlimit` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class StrokeMiterlimitProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'null' => [
                null,
                [],
                '',
                '',
                "Should return an empty string when attribute is set to 'null'.",
            ],
            'float' => [
                4.0,
                [],
                4.0,
                ' stroke-miterlimit="4"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                1,
                [],
                1,
                ' stroke-miterlimit="1"',
                'Should return the attribute value after setting it.',
            ],
            'replace existing' => [
                '4',
                ['stroke-miterlimit' => '10'],
                '4',
                ' stroke-miterlimit="4"',
                "Should return new 'stroke-miterlimit' after replacing existing 'stroke-miterlimit' attribute.",
            ],
            'string' => [
                '1',
                [],
                '1',
                ' stroke-miterlimit="1"',
                'Should return the attribute value after setting it.',
            ],
            'string float' => [
                '3.5',
                [],
                '3.5',
                ' stroke-miterlimit="3.5"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['stroke-miterlimit' => '4'],
                '',
                '',
                "Should unset the 'stroke-miterlimit' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
