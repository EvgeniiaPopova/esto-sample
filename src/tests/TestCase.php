<?php

namespace Tests;

use Faker\Factory as Faker;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;
    
    protected $faker;
    
    /**
     * Set up the test
     */
    public function setUp() :void
    {
        parent::setUp();
    }
    
    public function runDatabaseMigrations()
    {
        $this->artisan('migrate');
        $this->artisan('db:seed');
        
        $this->app[Kernel::class]->setArtisan(null);

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');

            RefreshDatabaseState::$migrated = false;
        });
    }
    /**
     * Reset the migrations
     */
    public function tearDown() :void
    {
        $this->artisan('migrate:reset');
        parent::tearDown();
    }
}
