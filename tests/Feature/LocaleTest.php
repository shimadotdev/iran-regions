<?php

namespace Shimadotdev\IranRegions\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Shimadotdev\IranRegions\Iran;

class LocaleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Run the artisan command to install the regions
        $this->artisan('iran-regions:install');
    }

    public function testLocaleForProvinceQuery()
    {
        // Retrieve a province by its slug
        $province = Iran::province()->where('slug', 'azarbaijan-sharqi')->first();

        // Assert that the province was retrieved successfully
        $this->assertNotNull($province);

        // Test Persian translation
        App::setLocale('fa');
        $this->assertEquals("آذربایجان شرقی", trans('iranRegions::slug.' . $province->slug));

        // Test English translation
        App::setLocale('en');
        $this->assertEquals("Azarbaijan Sharqi", trans('iranRegions::slug.' . $province->slug));
    }

    public function testLocaleForCityQuery()
    {
        // Retrieve a city by its slug
        $city = Iran::city()->where('slug', 'tooyeeserkan')->first();

        // Assert that the city was retrieved successfully
        $this->assertNotNull($city);

        // Test Persian translation
        App::setLocale('fa');
        $this->assertEquals("تویسرکان", trans('iranRegions::slug.' . $city->slug));

        // Test English translation
        App::setLocale('en');
        $this->assertEquals("Tooyeeserkan", trans('iranRegions::slug.' . $city->slug));
    }
}
