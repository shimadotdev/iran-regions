<?php

namespace Shimadotdev\IranRegions\Actions;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Shimadotdev\IranRegions\Models\City;
use Shimadotdev\IranRegions\Models\Province;

class IranRegionsSeedAction extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $jsonData = File::get(__DIR__ . '/../../resources/json/data.json');
        $provinces = json_decode($jsonData, true);

        DB::beginTransaction();

        try {

            foreach ($provinces as $provinceData) {

                if (isset($provinceData['cities'])) {

                    $cityData = $provinceData['cities'];
                    unset($provinceData['cities']);

                }

                $province = Province::updateOrCreate(
                    ['slug' => $provinceData['slug']],
                    $provinceData
                );

                foreach ($cityData as $city) {

                    $city['province_id'] = $province->id;

                    City::updateOrCreate(
                        ['slug' => $city['slug'], 'province_id' => $province->id],
                        $city
                    );
                }
            }

            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            throw $e;

        }

    }

}
