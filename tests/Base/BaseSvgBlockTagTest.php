<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests\Base;

use Fiber;
use LogicException;
use PHPForge\Support\LineEndingNormalizer;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;
use UIAwesome\Html\Svg\Base\BaseSvgBlockTag;
use UIAwesome\Html\Svg\Defs;
use UIAwesome\Html\Svg\Tests\Support\Stub\InspectableSvgBlockTag;
use WeakMap;

/**
 * Unit tests for {@see BaseSvgBlockTag} begin/end stack behavior.
 *
 * Test coverage.
 * - Dispatches protected hooks from concrete subclasses.
 * - Removes the current execution context after the last matching {@see BaseSvgBlockTag::end() end()} call.
 * - Resets the instance begin state after rendering through {@see BaseSvgBlockTag::end() end()}.
 *
 * {@see BaseSvgBlockTag} for the base implementation details.
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
#[Group('svg')]
final class BaseSvgBlockTagTest extends TestCase
{
    public function testBeginDispatchesProtectedRunBeginHook(): void
    {
        $this->resetBeginEndState();

        self::assertSame(
            '<custom-begin>',
            InspectableSvgBlockTag::tag()->begin(),
            'Should dispatch the protected runBegin() hook implemented by the concrete tag.',
        );

        InspectableSvgBlockTag::end();
    }

    public function testEndRemovesCurrentExecutionContextAfterLastMatchingBegin(): void
    {
        $this->resetBeginEndState();

        Defs::tag()->begin();
        Defs::end();

        $stack = $this->readStack();

        self::assertInstanceOf(
            WeakMap::class,
            $stack,
            'Should keep the initialized stack container after begin/end rendering.',
        );
        self::assertCount(
            0,
            $stack,
            'Should remove the current execution context when the matching begin/end stack becomes empty.',
        );
    }

    public function testEndResetsBeginStateOnTheRenderedInstance(): void
    {
        $this->resetBeginEndState();

        $tag = InspectableSvgBlockTag::tag()->content('value');

        $tag->begin();

        self::assertTrue(
            $tag->beginExecuted(),
            'Should mark the instance as started after begin() is called.',
        );

        InspectableSvgBlockTag::end();

        self::assertFalse(
            $tag->beginExecuted(),
            'Should reset the begin state after end() renders the matching instance.',
        );
        self::assertEquals(
            <<<HTML
            <defs>
            value
            </defs>
            HTML,
            LineEndingNormalizer::normalize($tag->render()),
            'Should render a full element after the begin/end cycle is completed.',
        );
    }

    public function testEndUsesSeparateStackForFiberExecutionContext(): void
    {
        $this->resetBeginEndState();

        Defs::tag()->begin();

        $exception = null;
        $fiber = new Fiber(
            static function () use (&$exception): void {
                try {
                    Defs::end();
                } catch (LogicException $e) {
                    $exception = $e;
                }
            },
        );

        try {
            $fiber->start();
        } finally {
            try {
                Defs::end();
            } catch (LogicException) {
            }
        }

        self::assertInstanceOf(
            LogicException::class,
            $exception,
            'Should keep begin/end stacks isolated between the main thread and fibers.',
        );
    }

    protected function tearDown(): void
    {
        $this->resetBeginEndState();
    }

    private function readStack(): mixed
    {
        return (new ReflectionProperty(BaseSvgBlockTag::class, 'stack'))->getValue();
    }

    private function resetBeginEndState(): void
    {
        (new ReflectionProperty(BaseSvgBlockTag::class, 'mainThread'))->setValue(null, null);
        (new ReflectionProperty(BaseSvgBlockTag::class, 'stack'))->setValue(null, null);
    }
}
