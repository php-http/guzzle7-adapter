<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle7\Client;
use Http\Client\HttpAsyncClient;
use Http\Client\Tests\HttpAsyncClientTest;

/**
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
abstract class HttpAsyncAdapterTest extends HttpAsyncClientTest
{
    /**
     * {@inheritdoc}
     */
    protected function createHttpAsyncClient(): HttpAsyncClient
    {
        return new Client(new GuzzleClient(['handler' => $this->createHandler()]));
    }

    /**
     * Returns a handler for the client.
     *
     * @return object
     */
    abstract protected function createHandler();
}
