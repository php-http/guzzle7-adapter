<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use GuzzleHttp\Handler\CurlHandler;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class CurlHttpAdapterTest extends HttpAdapterTest
{
    protected function createHandler()
    {
        return new CurlHandler();
    }
}
