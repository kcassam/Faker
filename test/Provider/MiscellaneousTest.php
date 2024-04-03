<?php

declare(strict_types=1);

namespace Faker\Test\Provider;

use Faker\Provider\Miscellaneous;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class MiscellaneousTest extends TestCase
{
    public function testBoolean(): void
    {
        self::assertContains(Miscellaneous::boolean(), [true, false]);
    }

    public function testMd5(): void
    {
        self::assertMatchesRegularExpression('/^[a-z0-9]{32}$/', Miscellaneous::md5());
    }

    public function testMd5ExpectedSeed(): void
    {
        $this->faker->seed(252);
        self::assertEquals('fa72146b50f73db08c92053d1fc5f263', $this->faker->md5());
    }

    public function testSha1(): void
    {
        self::assertMatchesRegularExpression('/^[a-z0-9]{40}$/', Miscellaneous::sha1());
    }

    public function testSha1ExpectedSeed(): void
    {
        $this->faker->seed(252);
        self::assertEquals('5ecb7a1b22291b6b15e534852e03ac72f4187a48', $this->faker->sha1());
    }

    public function testSha256(): void
    {
        self::assertMatchesRegularExpression('/^[a-z0-9]{64}$/', Miscellaneous::sha256());
    }

    public function testSha256ExpectedSeed(): void
    {
        $this->faker->seed(252);
        self::assertEquals('ea98b35136e020d9dd9b594252d9263021d1742da2bd4c8592b854c62b4122c2', $this->faker->sha256());
    }

    public function testLocale(): void
    {
        self::assertMatchesRegularExpression('/^[a-z]{2,3}_[A-Z]{2}$/', Miscellaneous::locale());
    }

    public function testCountryCode(): void
    {
        self::assertMatchesRegularExpression('/^[A-Z]{2}$/', Miscellaneous::countryCode());
    }

    public function testCountryISOAlpha3(): void
    {
        self::assertMatchesRegularExpression('/^[A-Z]{3}$/', Miscellaneous::countryISOAlpha3());
    }

    public function testLanguage(): void
    {
        self::assertMatchesRegularExpression('/^[a-z]{2}$/', Miscellaneous::languageCode());
    }

    public function testCurrencyCode(): void
    {
        self::assertMatchesRegularExpression('/^[A-Z]{3}$/', Miscellaneous::currencyCode());
    }

    public function testEmoji(): void
    {
        self::assertMatchesRegularExpression('/^[\x{1F600}-\x{1F637}]$/u', Miscellaneous::emoji());
    }

    protected function getProviders(): iterable
    {
        yield new Miscellaneous($this->faker);
    }
}
