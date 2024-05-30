<?php

namespace Shimadotdev\IranRegions\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    
    protected function getPackageProviders($app): array
    {
        return [\Shimadotdev\IranRegions\IranRegionsServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate', 
                    ['--database' => 'testbench'])->run();    
    }

}