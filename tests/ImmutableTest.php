<?php

declare(strict_types=1);

namespace UIAwesome\Html\Graphic\Tests;

use UIAwesome\Html\Graphic\Svg;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutableTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutable(): void
    {
        $instance = Svg::widget();

        $this->assertNotSame($instance, $instance->content(''));
        $this->assertNotSame($instance, $instance->filePath('php.svg'));
        $this->assertNotSame($instance, $instance->fill(''));
        $this->assertNotSame($instance, $instance->height(0));
        $this->assertNotSame($instance, $instance->stroke(''));
        $this->assertNotSame($instance, $instance->viewBox(''));
        $this->assertNotSame($instance, $instance->width(0));
        $this->assertNotSame($instance, $instance->xmlns(''));
    }
}
