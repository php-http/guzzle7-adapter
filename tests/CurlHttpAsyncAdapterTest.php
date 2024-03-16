<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use GuzzleHttp\Handler\CurlHandler;

/**
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
class CurlHttpAsyncAdapterTest extends HttpAsyncAdapterTest
{
    protected function createHandler()
    {
        return new CurlHandler();
    }
}
