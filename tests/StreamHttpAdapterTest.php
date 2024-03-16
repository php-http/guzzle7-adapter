<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use GuzzleHttp\Handler\StreamHandler;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class StreamHttpAdapterTest extends HttpAdapterTest
{
    protected function createHandler()
    {
        return new StreamHandler();
    }
}
