<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use GuzzleHttp\Handler\CurlMultiHandler;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class MultiCurlHttpAdapter extends AbstractHttpAdapter
{
    protected function createHandler()
    {
        return new CurlMultiHandler();
    }
}
