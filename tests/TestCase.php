<?php

namespace Tests;

use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\Bootstrap\LoadConfiguration;
use Orchestra\Testbench\TestCase as OrchTestCase;
use CoopComputing\LaravelHubSpot\HubSpotServiceProvider;

abstract class TestCase extends OrchTestCase
{
	/**
	 * Load our ServiceProvider.
	 */
	protected function getPackageProviders($app)
	{
		return [HubSpotServiceProvider::class];
	}

	/**
	 * Loads in our package .env file.
	 */
	protected function getEnvironmentSetUp($app)
	{
		$app->useEnvironmentPath(__DIR__.'/..');
		$app->bootstrapWith([LoadEnvironmentVariables::class]);
		$app->bootstrapWith([LoadConfiguration::class]);
		parent::getEnvironmentSetUp($app);
	}
}
