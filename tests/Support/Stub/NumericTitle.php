<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Support\Stub;

/**
 * Integer-backed title rejected by the string-only title contract.
 */
enum NumericTitle: int
{
    case ZERO = 0;
}
