<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Core\Values\Aria;
use UIAwesome\Html\Core\Values\ContentEditable;
use UIAwesome\Html\Core\Values\DataProperty;
use UIAwesome\Html\Core\Values\Direction;
use UIAwesome\Html\Core\Values\Draggable;
use UIAwesome\Html\Core\Values\Language;
use UIAwesome\Html\Core\Values\Role;
use UIAwesome\Html\Core\Values\Translate;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Svg;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultThemeProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;

final class SvgTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAccesskey(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg accesskey="k">
            value
            </svg>
            HTML,
            Svg::tag()->accesskey('k')->content('value')->render(),
            "Failed asserting that element renders correctly with 'accesskey' attribute.",
        );
    }

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg aria-pressed="true">
            value
            </svg>
            HTML,
            Svg::tag()->addAriaAttribute('pressed', true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg aria-pressed="true">
            value
            </svg>
            HTML,
            Svg::tag()->addAriaAttribute(Aria::PRESSED, true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg data-value="value">
            value
            </svg>
            HTML,
            Svg::tag()->addDataAttribute('value', 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg data-value="value">
            value
            </svg>
            HTML,
            Svg::tag()->addDataAttribute(DataProperty::VALUE, 'value')->content('value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            value
            </svg>
            HTML,
            Svg::tag()
                ->ariaAttributes(
                    [
                        'controls' => static fn(): string => 'modal-1',
                        'hidden' => false,
                        'label' => 'Close',
                    ],
                )
                ->content('value')
                ->render(),
            "Failed asserting that element renders correctly with 'ariaAttributes()' method.",
        );
    }

    public function testRenderWithAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg class="value">
            value
            </svg>
            HTML,
            Svg::tag()->attributes(['class' => 'value'])->content('value')->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithAutofocus(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg autofocus>
            value
            </svg>
            HTML,
            Svg::tag()->autofocus(true)->content('value')->render(),
            "Failed asserting that element renders correctly with 'autofocus' attribute.",
        );
    }

    public function testRenderWithBeginEnd(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg>
            Content
            </svg>
            HTML,
            Svg::tag()->content('value')->begin() . 'Content' . Svg::end(),
            "Failed asserting that element renders correctly with 'begin()' and 'end()' methods.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg class="value">
            value
            </svg>
            HTML,
            Svg::tag()->class('value')->content('value')->render(),
        );
    }

    public function testRenderWithContent(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg>
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->render(),
            'Failed asserting that element renders correctly with default values.',
        );
    }

    public function testRenderWithContentEditable(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg contenteditable="true">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->contentEditable(true)->render(),
            "Failed asserting that element renders correctly with 'contentEditable' attribute.",
        );
    }

    public function testRenderWithContentEditableUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg contenteditable="true">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->contentEditable(ContentEditable::TRUE)->render(),
            "Failed asserting that element renders correctly with 'contentEditable' attribute using enum.",
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg data-value="test-value">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg class="default-class">
            <title>
            default-title
            </title>
            value
            </svg>
            HTML,
            Svg::tag(['class' => 'default-class', 'title' => 'default-title'])->content('value')->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg class="default-class">
            <title>
            default-title
            </title>
            value
            </svg>
            HTML,
            Svg::tag()->addDefaultProvider(DefaultProvider::class)->content('value')->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithDir(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg dir="rtl">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->dir('rtl')->render(),
            "Failed asserting that element renders correctly with 'dir' attribute.",
        );
    }

    public function testRenderWithDirUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg dir="rtl">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->dir(Direction::RTL)->render(),
            "Failed asserting that element renders correctly with 'dir' attribute using enum.",
        );
    }

    public function testRenderWithDraggable(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg draggable="true">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->draggable(true)->render(),
            "Failed asserting that element renders correctly with 'draggable' attribute.",
        );
    }

    public function testRenderWithDraggableUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg draggable="true">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->draggable(Draggable::TRUE)->render(),
            "Failed asserting that element renders correctly with 'draggable' attribute using enum.",
        );
    }

    public function testRenderWithEmptySvgFileAndTitle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>Appended Title</title></svg>
            HTML,
            Svg::tag()
                ->filePath(__DIR__ . '/Support/Stub/empty.svg')
                ->title('Appended Title')
                ->render(),
            "Failed asserting that element renders correctly with empty SVG file and 'title' attribute.",
        );
    }

    public function testRenderWithFileContainingXmlButNoSvgTag(): void
    {
        self::assertEmpty(
            Svg::tag()->filePath(__DIR__ . '/Support/Stub/no-svg-tag.svg')->render(),
            'Failed asserting that render returns empty string when SVG tag is missing.',
        );
    }

    public function testRenderWithFilePath(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 640 512"><path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"/></svg>
            HTML,
            Svg::tag()->filePath(__DIR__ . '/Support/Stub/php.svg')->render(),
        );
    }

    public function testRenderWithFilePathAndBooleanAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 640 512" autofocus="autofocus"><path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"/></svg>
            HTML,
            Svg::tag()->attributes(['autofocus' => true])->filePath(__DIR__ . '/Support/Stub/php.svg')->render(),
        );
    }

    public function testRenderWithFilePathAndSpecialCharactersInAttributes(): void
    {
        $specialChars = 'foo " bar & baz';

        $html = Svg::tag()
            ->attributes(['data-test' => $specialChars])
            ->filePath(__DIR__ . '/Support/Stub/php.svg')
            ->render();

        self::assertStringContainsString(
            'data-test="foo &quot; bar &amp; baz"',
            $html,
            'Failed asserting that special characters in attributes are properly encoded.',
        );
        self::assertStringNotContainsString(
            'data-test="foo &amp;quot; bar &amp;amp; baz"',
            $html,
            'Failed asserting that special characters in attributes are not double-encoded.',
        );
    }

    public function testRenderWithFilePathAndTitle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 640 512"><title>PHP Logo</title><path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"/></svg>
            HTML,
            Svg::tag()->filePath(__DIR__ . '/Support/Stub/php.svg')->title('PHP Logo')->render(),
        );
    }

    public function testRenderWithFill(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg fill="#ff0000">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->fill('#ff0000')->render(),
            "Failed asserting that element renders correctly with 'fill' attribute.",
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Svg::class, ['title' => 'default-title']);

        self::equalsWithoutLE(
            <<<HTML
            <svg>
            <title>
            default-title
            </title>
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Svg::class, []);
    }

    public function testRenderWithHidden(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg hidden>
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->hidden(true)->render(),
            "Failed asserting that element renders correctly with 'hidden' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg id="test-id">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->id('test-id')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithItemId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg itemid="http://example.com/item">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->itemId('http://example.com/item')->render(),
            "Failed asserting that element renders correctly with 'itemId' attribute.",
        );
    }

    public function testRenderWithItemProp(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg itemprop="name">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->itemProp('name')->render(),
            "Failed asserting that element renders correctly with 'itemProp' attribute.",
        );
    }

    public function testRenderWithItemRef(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg itemref="additional-info">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->itemRef('additional-info')->render(),
            "Failed asserting that element renders correctly with 'itemRef' attribute.",
        );
    }

    public function testRenderWithItemScope(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg itemscope>
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->itemScope(true)->render(),
            "Failed asserting that element renders correctly with 'itemScope' attribute.",
        );
    }

    public function testRenderWithItemType(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg itemtype="http://schema.org/Person">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->itemType('http://schema.org/Person')->render(),
            "Failed asserting that element renders correctly with 'itemType' attribute.",
        );
    }

    public function testRenderWithLang(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg lang="es">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->lang('es')->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg lang="es">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->lang(Language::SPANISH)->render(),
            "Failed asserting that element renders correctly with 'lang' attribute using enum.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg opacity="0.5">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->opacity('0.5')->render(),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithPreserveAspectRatio(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg preserveAspectRatio="xMidYMid meet">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->preserveAspectRatio('xMidYMid meet')->render(),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg role="banner">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->role('banner')->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg role="banner">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->role(Role::BANNER)->render(),
            "Failed asserting that element renders correctly with 'role' attribute using enum.",
        );
    }

    public function testRenderWithSpellcheck(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg spellcheck="true">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->spellcheck(true)->render(),
            "Failed asserting that element renders correctly with 'spellcheck' attribute.",
        );
    }

    public function testRenderWithStroke(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg stroke="#00ff00">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->stroke('#00ff00')->render(),
            "Failed asserting that element renders correctly with 'stroke' attribute.",
        );
    }

    public function testRenderWithStrokeLineCap(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg stroke-linecap="round">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->strokeLineCap('round')->render(),
            "Failed asserting that element renders correctly with 'stroke-linecap' attribute.",
        );
    }

    public function testRenderWithStrokeLineJoin(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg stroke-linejoin="round">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->strokeLineJoin('round')->render(),
            "Failed asserting that element renders correctly with 'stroke-linejoin' attribute.",
        );
    }

    public function testRenderWithStrokeWidth(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg stroke-width="2">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->strokeWidth('2')->render(),
            "Failed asserting that element renders correctly with 'stroke-width' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg style='test-value'>
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->style('test-value')->render(),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTabindex(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg tabindex="3">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->tabIndex(3)->render(),
            "Failed asserting that element renders correctly with 'tabindex' attribute.",
        );
    }

    public function testRenderWithThemeProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg class="tag-primary">
            value
            </svg>
            HTML,
            Svg::tag()->addThemeProvider('primary', DefaultThemeProvider::class)->content('value')->render(),
            'Failed asserting that theme provider is applied correctly.',
        );
    }

    public function testRenderWithTitle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg>
            <title>
            test-value
            </title>
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->title('test-value')->render(),
            "Failed asserting that element renders correctly with 'title' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg>
            value
            </svg>
            HTML,
            (string) Svg::tag()->content('value'),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg transform="rotate(45)">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->transform('rotate(45)')->render(),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithTranslate(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg translate="no">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->translate(false)->render(),
            "Failed asserting that element renders correctly with 'translate' attribute.",
        );
    }

    public function testRenderWithTranslateUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg translate="yes">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->translate(Translate::YES)->render(),
            "Failed asserting that element renders correctly with 'translate' attribute using enum.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Svg::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <svg class="from-global" id="id-user">
            value
            </svg>
            HTML,
            Svg::tag(['id' => 'id-user'])->content('value')->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Svg::class, []);
    }

    public function testRenderWithViewBox(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg viewBox="0 0 100 100">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->viewBox('0 0 100 100')->render(),
            "Failed asserting that element renders correctly with 'viewBox' attribute.",
        );
    }

    public function testRenderWithX(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg x="10">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->x('10')->render(),
            "Failed asserting that element renders correctly with 'x' attribute.",
        );
    }

    public function testRenderWithXmlns(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg-custom">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->xmlns('http://www.w3.org/2000/svg-custom')->render(),
            "Failed asserting that element renders correctly with 'xmlns' attribute.",
        );
    }

    public function testRenderWithY(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <svg y="20">
            value
            </svg>
            HTML,
            Svg::tag()->content('value')->y('20')->render(),
            "Failed asserting that element renders correctly with 'y' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $svg = Svg::tag();

        self::assertNotSame(
            $svg,
            $svg->filePath(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->fill(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->opacity(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->preserveAspectRatio(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->stroke(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->strokeLineCap(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->strokeLineJoin(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->strokeWidth(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->viewBox(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->x(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->xmlns(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $svg,
            $svg->y(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForContentIsEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::CONTENT_AND_FILEPATH_CANNOT_BE_BOTH_EMPTY->getMessage(),
        );

        Svg::tag()->content('')->render();
    }

    public function testThrowInvalidArgumentExceptionForFilePathIsEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::CONTENT_AND_FILEPATH_CANNOT_BE_BOTH_EMPTY->getMessage(),
        );

        Svg::tag()->filePath('')->render();
    }

    public function testThrowInvalidArgumentExceptionForInvalidValueTitleAttribute(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::TITLE_ATTRIBUTE_MUST_BE_STRING_OR_NULL->getMessage(),
        );

        Svg::tag()->attributes(['title' => []])->content('value')->render();
    }

    public function testThrowRuntimeExceptionForFilePathInvalidPath(): void
    {
        $file = 'invalid-path.svg';

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(
            Message::FAILED_TO_READ_FILE->getMessage($file),
        );

        Svg::tag()->filePath($file)->render();
    }

    public function testThrowRuntimeExceptionForFileSvgFailedToRead(): void
    {
        $filePath = __DIR__ . '/Support/Stub/svg-failed.svg';

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(
            Message::FAILED_TO_SANITIZE_SVG->getMessage($filePath),
        );

        Svg::tag()->filePath($filePath)->render();
    }
}
