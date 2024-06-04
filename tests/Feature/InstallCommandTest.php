<?php

namespace Shimadotdev\IranRegions\Tests;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Shimadotdev\IranRegions\Tests\TestCase;

class InstallCommandTest extends TestCase {

    use RefreshDatabase;

    /**
     * @covers Shimadotdev\IranRegions\Commands
    */
    public function test_runs_the_install_command_successfully()
	{
        $this->artisan('iran-regions:install')
            ->expectsOutputToContain("Seeding database")
            ->assertExitCode(0);

	}
}