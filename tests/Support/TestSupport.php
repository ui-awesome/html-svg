<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support;

use PHPUnit\Framework\{Assert, AssertionFailedError};

use function str_replace;

/**
 * Assertion helpers for PHPUnit tests that compare rendered output.
 *
 * Normalizes line endings before comparison to keep string assertions deterministic across platforms.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait TestSupport
{
    /**
     * Asserts that two strings are equal, ignoring differences in line endings.
     *
     * Normalizes line endings to Unix-style (`\n`) before comparison to ensure platform-independent validation of
     * string output in test scenarios.
     *
     * @param string $expected Expected string value.
     * @param string $actual Actual string value to compare.
     * @param string $message Optional assertion failure message.
     *
     * @throws AssertionFailedError if the assertion fails.
     */
    public static function equalsWithoutLE(string $expected, string $actual, string $message = ''): void
    {
        $expected = str_replace(["\r\n", "\r"], "\n", $expected);
        $actual = str_replace(["\r\n", "\r"], "\n", $actual);

        Assert::assertEquals($expected, $actual, $message);
    }
}
