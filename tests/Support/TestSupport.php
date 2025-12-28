<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\AssertionFailedError;

use function str_replace;

/**
 * Trait providing assertion utilities for test scenarios involving string comparison and normalization.
 *
 * Supplies standardized methods for comparing string values in test cases, ensuring consistent handling of line endings
 * and whitespace normalization across different platforms and environments.
 *
 * Designed for use in PHPUnit-based test suites to facilitate robust validation of HTML output, attribute rendering,
 * and component behavior.
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
