<?php

namespace Shimadotdev\IranRegions\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Shimadotdev\IranRegions\Iran;

class IranTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Run the artisan command to install the regions
        $this->artisan('iran-regions:install');
    }

    /**
     * @covers Shimadotdev\IranRegions
     */
    public function testProvinceQuery()
    {
        // Test querying a single province
        $province = Iran::province()->where('slug', 'tehran')->first();
        $this->assertEquals('tehran', $province->slug);

        // Test querying all provinces
        $provinces = Iran::province()->get();
        $this->assertNotEmpty($provinces);

        // Test specific provinces
        $expectedProvinces = ['isfehan', 'azarbaijan-sharqi']; // Example provinces
        $provinceSlugs = $provinces->pluck('slug')->toArray();
        foreach ($expectedProvinces as $expectedProvince) {
            $this->assertContains($expectedProvince, $provinceSlugs);
        }

        // Test relations
        $citiesOfArdabil = Iran::province()->find(3)->cities;
        $citiesSlugs = $citiesOfArdabil->pluck('slug')->toArray();
        $expectedCities = ['khalkhaal']; // Example provinces
        foreach ($expectedCities as $expectedCities) {
            $this->assertContains($expectedCities, $citiesSlugs);
        }

    }

    /**
     * @covers Shimadotdev\IranRegions
     */
    public function testCityQuery()
    {
        // Test querying a single city
        $city = Iran::city()->where('slug', 'tehran')->first();
        $this->assertEquals('tehran', $city->slug);

        // Test querying all cities
        $cities = Iran::city()->get();
        $this->assertNotEmpty($cities);

        // Test specific cities
        $expectedCities = ['tehran', 'mashhad']; // Example cities
        $citySlugs = $cities->pluck('slug')->toArray();
        foreach ($expectedCities as $expectedCity) {
            $this->assertContains($expectedCity, $citySlugs);
        }

        // Test relations
        $provinceOfNaeen = Iran::city()->where('slug', 'naeen')->first()->province;
        $this->assertEquals('isfehan', $provinceOfNaeen->slug);

    }
}
