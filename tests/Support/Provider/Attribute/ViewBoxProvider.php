<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasViewBoxTest}.
 *
 * Supplies test data for validating the SVG `viewBox` attribute in tag rendering.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class ViewBoxProvider
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
                '0 0 100 100',
                ['viewBox' => '0 0 50 50'],
                '0 0 100 100',
                ' viewBox="0 0 100 100"',
                "Should return new 'viewBox' after replacing the existing 'viewBox' attribute.",
            ],
            'string' => [
                '0 0 200 200',
                [],
                '0 0 200 200',
                ' viewBox="0 0 200 200"',
                'Should return the attribute value after setting it.',
            ],
            'string with negative origin' => [
                '-50 -50 100 100',
                [],
                '-50 -50 100 100',
                ' viewBox="-50 -50 100 100"',
                'Should return the attribute value after setting it.',
            ],
            'unset with null' => [
                null,
                ['viewBox' => '0 0 100 100'],
                '',
                '',
                "Should unset the 'viewBox' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
