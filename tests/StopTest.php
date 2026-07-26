<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPForge\Support\LineEndingNormalizer;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Core\Config\{Call, ComponentContext, Config, Cookbook, Recipe};
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Stop;
use UIAwesome\Html\Svg\Tests\Support\Stub\Theme;

/**
 * Unit tests for {@see Stop} element rendering and attribute handling.
 *
 * Verifies rendered output, configuration precedence, and immutability for {@see Stop::tag()}.
 *
 * {@see Stop} for element implementation details.
 * {@see Config} for application-scoped configuration.
 */
#[Group('svg')]
final class StopTest extends TestCase
{
    public function testRenderWithContentAttributes(): void
    {
        self::assertEquals(
            <<<HTML
            <stop>
            HTML,
            LineEndingNormalizer::normalize(
                Stop::tag()->render(),
            ),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::assertEquals(
            <<<HTML
            <stop stop-color="#000">
            HTML,
            LineEndingNormalizer::normalize(
                Stop::tag(['stopColor' => '#000'])->render(),
            ),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultsFromConfig(): void
    {
        $config = new Config(
            new Theme(
                'svg',
                new Recipe(
                    'svg.stop',
                    new Cookbook(new Call('class', 'default-class'), new Call('title', 'default-title')),
                ),
            ),
        );

        self::assertEquals(
            <<<HTML
            <stop class="default-class" title="default-title">
            HTML,
            LineEndingNormalizer::normalize(
                Stop::tag()
                    ->config($config, new ComponentContext('stop'))
                    ->render(),
            ),
            'Failed asserting that config recipes are applied correctly.',
        );
    }

    public function testRenderWithOffset(): void
    {
        self::assertEquals(
            <<<HTML
            <stop offset="50%">
            HTML,
            LineEndingNormalizer::normalize(
                Stop::tag()->offset('50%')->render(),
            ),
            "Failed asserting that element renders correctly with 'offset' attribute.",
        );
    }

    public function testRenderWithStopColor(): void
    {
        self::assertEquals(
            <<<HTML
            <stop stop-color="#ff0000">
            HTML,
            LineEndingNormalizer::normalize(
                Stop::tag()->stopColor('#ff0000')->render(),
            ),
            "Failed asserting that element renders correctly with 'stop-color' attribute.",
        );
    }

    public function testRenderWithStopOpacity(): void
    {
        self::assertEquals(
            <<<HTML
            <stop stop-opacity="0.5">
            HTML,
            LineEndingNormalizer::normalize(
                Stop::tag()->stopOpacity(0.5)->render(),
            ),
            "Failed asserting that element renders correctly with 'stop-opacity' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $stop = Stop::tag();

        self::assertNotSame(
            $stop,
            $stop->offset(0),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $stop,
            $stop->stopColor(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $stop,
            $stop->stopOpacity(null),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingOffsetPercentageAboveMaximumValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 100),
        );

        Stop::tag()->offset('101%');
    }

    public function testThrowInvalidArgumentExceptionForSettingOffsetValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Stop::tag()->offset('invalid-value');
    }

    public function testThrowInvalidArgumentExceptionForSettingStopOpacityAboveMaximumValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Stop::tag()->stopOpacity(1.5);
    }

    public function testThrowInvalidArgumentExceptionForSettingStopOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Stop::tag()->stopOpacity('invalid-value');
    }
}
