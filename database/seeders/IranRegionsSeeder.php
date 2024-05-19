<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Shimadotdev\IranRegions\Actions\IranRegionsSeedAction;

class IranRegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(IranRegionsSeedAction::class);

    }



}
