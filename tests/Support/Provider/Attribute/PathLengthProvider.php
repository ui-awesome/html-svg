<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Provider\Attribute;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\Attribute\HasPathLengthTest}.
 *
 * Provides representative input/output pairs for testing the `pathLength` attribute functionality.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class PathLengthProvider
{
    /**
     * @phpstan-return array<string, array{float|int|string|null, mixed[], float|int|string, string, string}>
     */
    public static function values(): array
    {
        return [
            'float' => [
                50.5,
                [],
                50.5,
                ' pathLength="50.5"',
                'Should return the attribute value after setting it.',
            ],
            'integer' => [
                100,
                [],
                100,
                ' pathLength="100"',
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
                75,
                ['pathLength' => 50],
                75,
                ' pathLength="75"',
                "Should return new 'pathLength' after replacing the existing 'pathLength' attribute.",
            ],
            'unset with null' => [
                null,
                ['pathLength' => 100],
                '',
                '',
                "Should unset the 'pathLength' attribute when 'null' is provided after a value.",
            ],
        ];
    }
}
