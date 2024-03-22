<?php

declare(strict_types=1);

namespace UIAwesome\Html\Graphic\Tests;

use UIAwesome\Html\Graphic\Svg;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testFilePathEmpty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('File path and content cannot be empty at the same time for SVG widget.');

        Svg::widget()->filePath('')->render();
    }

    public function testFilePathInvalidPath(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Failed to read SVG file: php.svg');

        Svg::widget()->filePath('php.svg')->render();
    }

    public function testFileSvgFailedToRead(): void
    {
        $filePath = __DIR__ . '/Stub/svg-failed.svg';
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Failed to sanitize SVG file: ' . $filePath);

        Svg::widget()->filePath($filePath)->render();
    }
}
