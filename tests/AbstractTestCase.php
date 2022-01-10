<?php

namespace i4e\Tests\Whmcs;

use i4e\Whmcs\Facades\Whmcs;
use i4e\Whmcs\WhmcsServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [WhmcsServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return ['Whmcs' => Whmcs::class];
    }
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('session.driver', 'array');
    }
}
