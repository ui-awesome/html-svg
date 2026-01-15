<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use UIAwesome\Html\Attribute\Values\{Aria, Data, Language, Role};
use UIAwesome\Html\Core\Factory\SimpleFactory;
use UIAwesome\Html\Svg\Exception\Message;
use UIAwesome\Html\Svg\Image;
use UIAwesome\Html\Svg\Tests\Support\Stub\DefaultProvider;
use UIAwesome\Html\Svg\Tests\Support\TestSupport;
use UIAwesome\Html\Svg\Values\PreserveAspectRatio;

/**
 * Test suite for {@see Image} element functionality and behavior.
 *
 * Validates the management and rendering of the SVG `<image>` element according to the SVG 2 and HTML Living Standard
 * specifications.
 *
 * Ensures correct handling, immutability, and validation of the `Image` tag rendering, supporting all global HTML, SVG
 * 2 attributes and provider-based configuration.
 *
 * Test coverage.
 * - Accurate rendering of the `<image>` element.
 * - Correct application of global HTML attributes and SVG-specific attributes.
 * - Error handling for invalid attribute values.
 * - Immutability of the API, ensuring that setting attributes returns a new instance.
 * - Integration with configuration providers and global factory defaults.
 * - Precedence of user-defined attributes over global defaults and provider settings.
 *
 * {@see Image} for element implementation details.
 * {@see SimpleFactory} for default configuration management.
 * {@see TestSupport} for assertion utilities.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class ImageTest extends TestCase
{
    use TestSupport;

    public function testRenderWithAccesskey(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image accesskey="k">
            HTML,
            Image::tag()->accesskey('k')->render(),
            "Failed asserting that element renders correctly with 'accesskey' attribute.",
        );
    }

    public function testRenderWithAddAriaAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image aria-pressed="true">
            HTML,
            Image::tag()->addAriaAttribute('pressed', true)->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddAriaAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image aria-pressed="true">
            HTML,
            Image::tag()->addAriaAttribute(Aria::PRESSED, true)->render(),
            "Failed asserting that element renders correctly with 'addAriaAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttribute(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image data-value="value">
            HTML,
            Image::tag()->addDataAttribute('value', 'value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAddDataAttributeUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image data-value="value">
            HTML,
            Image::tag()->addDataAttribute(Data::VALUE, 'value')->render(),
            "Failed asserting that element renders correctly with 'addDataAttribute()' method.",
        );
    }

    public function testRenderWithAriaAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image aria-controls="modal-1" aria-hidden="false" aria-label="Close">
            HTML,
            Image::tag()
                ->ariaAttributes(
                    [
                        'controls' => static fn(): string => 'modal-1',
                        'hidden' => false,
                        'label' => 'Close',
                    ],
                )
                ->render(),
            "Failed asserting that element renders correctly with 'ariaAttributes()' method.",
        );
    }

    public function testRenderWithAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image class="value">
            HTML,
            Image::tag()->attributes(['class' => 'value'])->render(),
            "Failed asserting that element renders correctly with 'attributes()' method.",
        );
    }

    public function testRenderWithClass(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image class="value">
            HTML,
            Image::tag()->class('value')->render(),
            "Failed asserting that element renders correctly with 'class' attribute.",
        );
    }

    public function testRenderWithDataAttributes(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image data-value="test-value">
            HTML,
            Image::tag()->dataAttributes(['value' => 'test-value'])->render(),
            "Failed asserting that element renders correctly with 'dataAttributes()' method.",
        );
    }

    public function testRenderWithDecoding(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image decoding="async">
            HTML,
            Image::tag()->decoding('async')->render(),
            "Failed asserting that element renders correctly with 'decoding' attribute.",
        );
    }

    public function testRenderWithDefaultConfigurationValues(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image class="default-class">
            HTML,
            Image::tag(['class' => 'default-class'])->render(),
            'Failed asserting that default configuration values are applied correctly.',
        );
    }

    public function testRenderWithDefaultProvider(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image class="default-class" title="default-title">
            HTML,
            Image::tag()->addDefaultProvider(DefaultProvider::class)->render(),
            'Failed asserting that default provider is applied correctly.',
        );
    }

    public function testRenderWithDir(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image dir="rtl">
            HTML,
            Image::tag()->dir('rtl')->render(),
            "Failed asserting that element renders correctly with 'dir' attribute.",
        );
    }

    public function testRenderWithFetchpriority(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image fetchpriority="high">
            HTML,
            Image::tag()->fetchpriority('high')->render(),
            "Failed asserting that element renders correctly with 'fetchpriority' attribute.",
        );
    }

    public function testRenderWithGlobalDefaultsAreApplied(): void
    {
        SimpleFactory::setDefaults(Image::class, ['class' => 'default-class']);

        self::equalsWithoutLE(
            <<<HTML
            <image class="default-class">
            HTML,
            Image::tag()->render(),
            'Failed asserting that global defaults are applied correctly.',
        );

        SimpleFactory::setDefaults(Image::class, []);
    }

    public function testRenderWithHeight(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image height="200">
            HTML,
            Image::tag()->height('200')->render(),
            "Failed asserting that element renders correctly with 'height' attribute.",
        );
    }

    public function testRenderWithHidden(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image hidden>
            HTML,
            Image::tag()->hidden(true)->render(),
            "Failed asserting that element renders correctly with 'hidden' attribute.",
        );
    }

    public function testRenderWithHref(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image href="image.png">
            HTML,
            Image::tag()->href('image.png')->render(),
            "Failed asserting that element renders correctly with 'href' attribute.",
        );
    }

    public function testRenderWithId(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image id="test-id">
            HTML,
            Image::tag()->id('test-id')->render(),
            "Failed asserting that element renders correctly with 'id' attribute.",
        );
    }

    public function testRenderWithLangUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image lang="es">
            HTML,
            Image::tag()->lang(Language::SPANISH)->render(),
            "Failed asserting that element renders correctly with 'lang' attribute.",
        );
    }

    public function testRenderWithOpacity(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image opacity="0.5">
            HTML,
            Image::tag()->opacity('0.5')->render(),
            "Failed asserting that element renders correctly with 'opacity' attribute.",
        );
    }

    public function testRenderWithPreserveAspectRatio(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image preserveAspectRatio="xMidYMid meet">
            HTML,
            Image::tag()->preserveAspectRatio('xMidYMid meet')->render(),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute.",
        );
    }

    public function testRenderWithPreserveAspectRatioUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image preserveAspectRatio="xMinYMin slice">
            HTML,
            Image::tag()->preserveAspectRatio(PreserveAspectRatio::X_MIN_Y_MIN_SLICE)->render(),
            "Failed asserting that element renders correctly with 'preserveAspectRatio' attribute.",
        );
    }

    public function testRenderWithRole(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image role="banner">
            HTML,
            Image::tag()->role('banner')->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithRoleUsingEnum(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image role="banner">
            HTML,
            Image::tag()->role(Role::BANNER)->render(),
            "Failed asserting that element renders correctly with 'role' attribute.",
        );
    }

    public function testRenderWithStyle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image style='test-value'>
            HTML,
            Image::tag()->style('test-value')->render(),
            "Failed asserting that element renders correctly with 'style' attribute.",
        );
    }

    public function testRenderWithTitle(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image title="test-value">
            HTML,
            Image::tag()->title('test-value')->render(),
            "Failed asserting that element renders correctly with 'title' attribute.",
        );
    }

    public function testRenderWithToString(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image>
            HTML,
            (string) Image::tag(),
            "Failed asserting that '__toString()' method renders correctly.",
        );
    }

    public function testRenderWithTransform(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image transform="rotate(45)">
            HTML,
            Image::tag()->transform('rotate(45)')->render(),
            "Failed asserting that element renders correctly with 'transform' attribute.",
        );
    }

    public function testRenderWithTranslate(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image translate="no">
            HTML,
            Image::tag()->translate(false)->render(),
            "Failed asserting that element renders correctly with 'translate' attribute.",
        );
    }

    public function testRenderWithUserOverridesGlobalDefaults(): void
    {
        SimpleFactory::setDefaults(Image::class, ['class' => 'from-global', 'id' => 'id-global']);

        self::equalsWithoutLE(
            <<<HTML
            <image class="from-global" id="id-user">
            HTML,
            Image::tag(['id' => 'id-user'])->render(),
            'Failed asserting that user-defined attributes override global defaults correctly.',
        );

        SimpleFactory::setDefaults(Image::class, []);
    }

    public function testRenderWithWidth(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image width="300">
            HTML,
            Image::tag()->width('300')->render(),
            "Failed asserting that element renders correctly with 'width' attribute.",
        );
    }

    public function testRenderWithX(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image x="10">
            HTML,
            Image::tag()->x(10)->render(),
            "Failed asserting that element renders correctly with 'x' attribute.",
        );
    }

    public function testRenderWithY(): void
    {
        self::equalsWithoutLE(
            <<<HTML
            <image y="20">
            HTML,
            Image::tag()->y(20)->render(),
            "Failed asserting that element renders correctly with 'y' attribute.",
        );
    }

    public function testReturnNewInstanceWhenSettingAttribute(): void
    {
        $image = Image::tag();

        self::assertNotSame(
            $image,
            $image->decoding(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $image,
            $image->fetchpriority(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $image,
            $image->height(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $image,
            $image->href(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $image,
            $image->opacity('0'),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $image,
            $image->transform(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $image,
            $image->width(''),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $image,
            $image->x(0),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
        self::assertNotSame(
            $image,
            $image->y(0),
            'Should return a new instance when setting the attribute, ensuring immutability.',
        );
    }

    public function testThrowInvalidArgumentExceptionForSettingOpacityValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            Message::VALUE_OUT_OF_RANGE_OR_NULL->getMessage(0, 1),
        );

        Image::tag()->opacity('invalid-value');
    }
}
