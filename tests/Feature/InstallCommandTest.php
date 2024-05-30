<?php

namespace Shimadotdev\IranRegions\Tests;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Shimadotdev\IranRegions\Tests\TestCase;

class InstallCommandTest extends TestCase {

    use RefreshDatabase;

    /**
     * @todo define test attributes after phpunit 11 issue is fixed
    */
    public function test_runs_the_install_command_successfully()
	{
        $this->artisan('iran-regions:install')
            ->assertExitCode(0);
	}
}