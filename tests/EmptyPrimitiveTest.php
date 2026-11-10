<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Svg\{Circle, Image, LinearGradient, Rect, Stop, Svg, Symbol, Uses};

/**
 * Regression tests for empty SVG serialization and complete SVG compositions.
 */
#[Group('svg')]
final class EmptyPrimitiveTest extends TestCase
{
    public function testAttributeNormalization(): void
    {
        $circle = Circle::tag()->attributes(
            [
                'class' => [
                    'shape',
                    'icon',
                ],
                'style' => ['fill' => 'red'],
                'data-options' => ['count' => 2],
                'data-items' => [1, 2],
                'aria' => ['hidden' => false],
                'hidden' => true,
                'omit' => false,
                'remove' => null,
            ],
        );

        self::assertSame(
            <<<HTML
            <circle class="shape icon" style='fill: red;' aria-hidden="false" data-options='{"count":2}' data-items='[1,2]' hidden="hidden"/>
            HTML,
            $circle->render(),
            'Attribute ordering, JSON, style and boolean normalization must be preserved.',
        );
    }

    public function testEscapedAttributes(): void
    {
        $circle = Circle::tag()
            ->id('shape')
            ->addDataAttribute('label', '<tag> & "quoted" \'single\' &amp;')
            ->addAttribute('opacity', 0);

        self::assertSame(
            <<<HTML
            <circle id="shape" data-label="&lt;tag&gt; &amp; &quot;quoted&quot; &apos;single&apos; &amp;amp;" opacity="0"/>
            HTML,
            $circle->render(),
            'Attributes must be escaped exactly once and retain zero values.',
        );
    }

    public function testHiddenAttributes(): void
    {
        $original = Circle::tag();

        $hidden = $original->hidden(true);

        self::assertSame(
            '<circle hidden="hidden"/>',
            $hidden->render(),
            'XML attributes must have values.',
        );
        self::assertSame(
            '<circle/>',
            $hidden->hidden(false)->render(),
            'False must omit the hidden attribute.',
        );
        self::assertSame(
            '<circle/>',
            $hidden->hidden(null)->render(),
            'Null must remove the hidden attribute.',
        );
        self::assertSame(
            '<circle/>',
            $original->render(),
            'Hiding a clone must not change its source.',
        );
        self::assertSame(
            ['hidden' => true],
            $hidden->getAttributes(),
            'Rendering must not rewrite stored attributes.',
        );
    }

    public function testReferencesAndEscapedUrls(): void
    {
        $rendered = Svg::tag()
            ->xmlns('http://www.w3.org/2000/svg')
            ->html(
                Symbol::tag()
                    ->id('shape')
                    ->html(Circle::tag()->r(5)),
                Uses::tag()
                    ->href('#shape')
                    ->x(10),
                Image::tag()
                    ->href('sprite.svg?x=1&label="a"')
                    ->width(20)
                    ->height(10),
            )
            ->render();

        self::assertSame(
            <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="shape">
            <circle r="5"/>
            </symbol><use href="#shape" x="10"/><image href="sprite.svg?x=1&amp;label=&quot;a&quot;" width="20" height="10"/>
            </svg>
            HTML,
            $rendered,
            'References and image URLs must retain their complete escaped output.',
        );
    }

    public function testRepeatedRendersPreserveAttributes(): void
    {
        $circle = Circle::tag()->attributes(
            [
                'class' => [
                    'shape',
                    'icon',
                ],
                'data-label' => 'a&b',
            ],
        );

        $attributes = $circle->getAttributes();

        $expected = '<circle class="shape icon" data-label="a&amp;b"/>';

        self::assertSame(
            $expected,
            $circle->render(),
            'The first render must normalize and escape attributes.',
        );
        self::assertSame(
            $expected,
            $circle->render(),
            'Repeated rendering must be stable.',
        );
        self::assertSame(
            $expected,
            (string) $circle,
            'String conversion must use the same renderer.',
        );
        self::assertSame(
            $attributes,
            $circle->getAttributes(),
            'Rendering must preserve the original attribute values.',
        );
    }

    public function testShapesAndStops(): void
    {
        $rendered = Svg::tag()
            ->xmlns('http://www.w3.org/2000/svg')
            ->html(
                Circle::tag()->r(5),
                Rect::tag()->width(5)->height(5),
                LinearGradient::tag()
                    ->id('gradient')
                    ->html(
                        Stop::tag()->offset('0%')->stopColor('#000'),
                        Stop::tag()->offset('100%')->stopColor('#fff'),
                    ),
            )
            ->render();

        self::assertSame(
            <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg">
            <circle r="5"/><rect width="5" height="5"/><linearGradient id="gradient">
            <stop offset="0%" stop-color="#000"/><stop offset="100%" stop-color="#fff"/>
            </linearGradient>
            </svg>
            HTML,
            $rendered,
            'Composition must emit complete shapes and stops in order.',
        );
    }
}
