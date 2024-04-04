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
        self::assertEquals('7c2a5276141e81fdf60015689c53d8a1', $this->faker->md5('seed_123'));
    }

    public function testSha1(): void
    {
        self::assertMatchesRegularExpression('/^[a-z0-9]{40}$/', Miscellaneous::sha1());
    }

    public function testSha1ExpectedSeed(): void
    {
        self::assertEquals('2d37797087b5130d79e51a08fa7f1cf7678c70ab', $this->faker->sha1('seed_123'));
    }

    public function testSha256(): void
    {
        self::assertMatchesRegularExpression('/^[a-z0-9]{64}$/', Miscellaneous::sha256());
    }

    public function testSha256ExpectedSeed(): void
    {
        self::assertEquals('a5aa26c454007319b3458f9a9162822c8c1ac5394c4124186b4d54703d9ac3cd', $this->faker->sha256('seed_123'));
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
