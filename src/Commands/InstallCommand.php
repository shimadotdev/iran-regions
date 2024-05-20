<?php

namespace Shimadotdev\IranRegions\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iran-regions:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install and publish IranRegions Package and import the data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Installing Shimadotdev\IranRegions...');

        Artisan::call('vendor:publish --tag=iran-regions --force');

        Artisan::call('migrate');

        Artisan::call('db:seed --class=IranRegionsSeeder', [], $this->getOutput());

    }
}
