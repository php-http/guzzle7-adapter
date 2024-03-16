<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use GuzzleHttp\Handler\StreamHandler;

/**
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
class StreamHttpAsyncAdapterTest extends HttpAsyncAdapterTest
{
    protected function createHandler()
    {
        return new StreamHandler();
    }
}
