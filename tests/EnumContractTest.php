<?php

declare(strict_types=1);

namespace UIAwesome\Html\Svg\Tests;

use BackedEnum;
use PHPUnit\Framework\Attributes\{DataProviderExternal, Group};
use PHPUnit\Framework\TestCase;
use ReflectionEnum;
use UIAwesome\Html\Svg\Tests\Provider\EnumContractProvider;
use ValueError;

use function sprintf;

/**
 * Unit tests for the {@see BackedEnum} contract exposed by the package enums.
 *
 * {@see EnumContractProvider} for test case data providers.
 */
#[Group('svg')]
final class EnumContractTest extends TestCase
{
    /**
     * @param class-string<BackedEnum> $enum
     * @param array<string, string> $expectedCases
     */
    #[DataProviderExternal(EnumContractProvider::class, 'contracts')]
    public function testCasesHaveTheExpectedNamesAndBackedValues(string $enum, array $expectedCases): void
    {
        $actualCases = [];

        foreach ((new ReflectionEnum($enum))->getCases() as $case) {
            $value = $case->getValue();

            if (!$value instanceof BackedEnum) {
                self::fail("{$enum} must be a backed enum.");
            }

            $actualCases[$case->getName()] = $value->value;
        }

        self::assertSame(
            $expectedCases,
            $actualCases,
            'Should preserve every public case name and backed value.',
        );
    }

    /**
     * @param class-string<BackedEnum> $enum
     */
    #[DataProviderExternal(EnumContractProvider::class, 'validValues')]
    public function testFromAndTryFromReturnTheExpectedCase(string $enum, string $name, string $value): void
    {
        $expectedCase = (new ReflectionEnum($enum))->getCase($name)->getValue();

        if (!$expectedCase instanceof BackedEnum) {
            self::fail("{$enum} must be a backed enum.");
        }

        self::assertSame(
            $expectedCase,
            $enum::from($value),
            'Should resolve the expected public case.',
        );
        self::assertSame(
            $expectedCase,
            $enum::tryFrom($value),
            'Should resolve the expected public case.',
        );
    }

    /**
     * @param class-string<BackedEnum> $enum
     */
    #[DataProviderExternal(EnumContractProvider::class, 'invalidValues')]
    public function testThrowValueErrorForAnUnknownBackedValue(string $enum, string $value): void
    {
        $this->expectException(ValueError::class);
        $this->expectExceptionMessage(
            sprintf('"%s" is not a valid backing value for enum %s', $value, $enum),
        );

        $enum::from($value);
    }

    /**
     * @param class-string<BackedEnum> $enum
     */
    #[DataProviderExternal(EnumContractProvider::class, 'invalidValues')]
    public function testTryFromReturnsNullForAnUnknownValue(string $enum, string $value): void
    {
        self::assertNull(
            $enum::tryFrom($value),
            'Should return no case for an unknown backed value.',
        );
    }
}
