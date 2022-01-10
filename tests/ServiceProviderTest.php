<?php

namespace i4e\Tests\Whmcs;

use i4e\Whmcs\WhmcsManager;

class ServiceProviderTest extends AbstractTestCase
{
    public function testInstantiated()
    {
        $instance = $this->app->make('whmcs');

        $this->assertInstanceOf(WhmcsManager::class, $instance);
    }
}
