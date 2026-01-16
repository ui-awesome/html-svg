<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Exception;

use function sprintf;

/**
 * Represents standardized error messages.
 *
 * This enum defines formatted error messages for various error conditions that may occur during operations such as
 * value validation.
 *
 * It provides a consistent and standardized way to present error messages across the system.
 *
 * Each case represents a specific type of error, with a message template that can be populated with dynamic values
 * using the {@see Message::getMessage()} method.
 *
 * This centralized approach improves the consistency of error messages and simplifies potential internationalization.
 *
 * Key features.
 * - Centralizes error messages for easier maintenance.
 * - Ensures consistent error messages across the system.
 * - Integrates with exception classes.
 * - Standardizes error messages for common cases.
 * - Supports message formatting with dynamic parameters.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Message: string
{
    /**
     * Error when both content and file path are empty.
     *
     * Message: "File path and content cannot be empty at the same time for SVG."
     */
    case CONTENT_AND_FILEPATH_CANNOT_BE_BOTH_EMPTY = 'File path and content cannot be empty at the same time for SVG.';

    /**
     * Error when failed to read a file.
     *
     * Format: "Failed to read file: '%s'."
     */
    case FAILED_TO_READ_FILE = "Failed to read file: '%s'.";

    /**
     * Error when failed to sanitize SVG content from a file.
     *
     * Format: "Failed to sanitize SVG content from file: '%s'."
     */
    case FAILED_TO_SANITIZE_SVG = "Failed to sanitize SVG content from file: '%s'.";

    /**
     * Error when the title attribute is not a `string` or `null`.
     *
     * Message: "Title attribute must be a `string` or `null`."
     */
    case TITLE_ATTRIBUTE_MUST_BE_STRING_OR_NULL = 'Title attribute must be a `string` or `null`.';

    /**
     * Error when the value is not a number `>= 1` or `null`.
     *
     * Message: "Value must be a number greater than or equal to `1` or `null` to unset."
     */
    case VALUE_MUST_BE_GTE_ONE_OR_NULL = 'Value must be a number greater than or equal to `1` or `null` to unset.';

    /**
     * Error when the value is not a positive number or `null`.
     *
     * Message: "Value must be a positive number or `null` to unset."
     */
    case VALUE_MUST_BE_POSITIVE_NUMBER_OR_NULL = 'Value must be a positive number or `null` to unset.';

    /**
     * Error when the value is out of range or not `null`.
     *
     * Message: "Value must be a number between '%s' and '%s' inclusive or `null` to unset."
     */
    case VALUE_OUT_OF_RANGE_OR_NULL = "Value must be a number between '%s' and '%s' inclusive or `null` to unset.";

    /**
     * Returns the formatted message string for the error case.
     *
     * @param int|string ...$argument Values to insert into the message template.
     *
     * @return string Formatted error message with interpolated arguments.
     *
     * Usage example:
     * ```php
     * throw new InvalidArgumentException(Message::FAILED_TO_READ_FILE->getMessage($filePath));
     * ```
     */
    public function getMessage(int|string ...$argument): string
    {
        return sprintf($this->value, ...$argument);
    }
}
