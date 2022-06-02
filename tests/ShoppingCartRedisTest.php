<?php

namespace Saasify\Cart\Tests;

use Illuminate\Support\Facades\Redis;
use Saasify\Cart\Repositories\CartRedisRepository;
use Orchestra\Testbench\TestCase;

class CartRedisTest extends TestCase
{
    use CartRepositoryTester;

    protected function getEnvironmentSetUp($app)
    {
        $config = $app['config'];

        $config->set(
            'cart.repository',
            CartRedisRepository::class
        );

        $config->set('database.redis.client', 'predis');
    }

    protected function tearDown(): void
    {
        Redis::flushAll();

        parent::tearDown();
    }
}
