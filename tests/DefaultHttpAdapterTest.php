<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use Http\Adapter\Guzzle7\Client;
use Http\Client\Tests\HttpClientTest;

/**
 * @author David Buchmann <mail@davidbu.ch>
 */
class DefaultHttpAdapterTest extends HttpClientTest
{
    /**
     * {@inheritdoc}
     */
    protected function createHttpAdapter()
    {
        return new Client();
    }
}
