<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Provider;

use UIAwesome\Html\Svg\Tests\Support\Stub\{NumericTitle, Title};
use UIAwesome\Html\Svg\Values\SvgAttribute;
use UnitEnum;

/**
 * Data provider for {@see \UIAwesome\Html\Svg\Tests\SvgTitleTest} test cases.
 *
 * Provides title payloads, SVG sources, entry routes, and accepted/rejected value types.
 */
final class SvgTitleProvider
{
    /**
     * @return array<string, array{UnitEnum, string, string}>
     */
    public static function enums(): array
    {
        $titles = [
            'backed enum' => [SvgAttribute::TITLE, SvgAttribute::TITLE->value],
            'pure enum' => [Title::LABEL, Title::LABEL->name],
        ];
        $cases = [];

        foreach ($titles as $titleName => [$title, $expected]) {
            foreach (self::sources() as $sourceName => [$source]) {
                $cases["$titleName / $sourceName"] = [$title, $source, $expected];
            }
        }

        return $cases;
    }

    /**
     * @return array<string, array{mixed, string}>
     */
    public static function invalidTitles(): array
    {
        $titles = [
            'array' => [],
            'boolean' => true,
            'integer' => 0,
            'float' => 1.5,
            'integer enum' => NumericTitle::ZERO,
        ];
        $cases = [];

        foreach ($titles as $titleName => $title) {
            foreach (self::sources() as $sourceName => [$source]) {
                $cases["$titleName / $sourceName"] = [$title, $source];
            }
        }

        return $cases;
    }

    /**
     * @return array<string, array{string}>
     */
    public static function sources(): array
    {
        return [
            'empty inline SVG' => ['inline-empty'],
            'inline SVG with path' => ['inline-path'],
            'empty SVG file' => ['empty.svg'],
            'SVG file with path' => ['php.svg'],
        ];
    }
    /**
     * @return array<string, array{string|null, string, string}>
     */
    public static function text(): array
    {
        $payloads = [
            'ordinary' => ['An ordinary title'],
            'ampersand' => ['A & B'],
            'adjacent ampersand' => ['R&D'],
            'quotes' => ['"double" and \'single\''],
            'element' => ['<b>x</b>'],
            'literal entities' => ['&amp; &#60; &lt;'],
            'closing title' => ['</title><script>inert()</script>'],
            'closing svg and event' => ['</title></svg><img src="inert" onerror="inert()"><svg>'],
            'foreign content' => ['<svg onload="inert()"><title>inert</title></svg>'],
            'whitespace' => ['  A title  '],
            'zero' => ['0'],
            'null' => [null],
            'empty' => [''],
        ];

        $entries = [
            'title setter' => 'title',
            'single attribute' => 'addAttribute',
            'attributes' => 'attributes',
            'replacement attributes' => 'replaceAttributes',
            'defaults' => 'defaults',
            'configuration' => 'config',
        ];
        $cases = [];

        foreach ($payloads as $name => [$payload]) {
            foreach (self::sources() as $sourceName => [$source]) {
                foreach ($entries as $entryName => $entry) {
                    $cases["$name / $sourceName / $entryName"] = [$payload, $source, $entry];
                }
            }
        }

        return $cases;
    }
}
