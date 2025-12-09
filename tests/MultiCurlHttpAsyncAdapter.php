<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use GuzzleHttp\Handler\CurlMultiHandler;

/**
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
class MultiCurlHttpAsyncAdapter extends AbstractHttpAsyncAdapter
{
    protected function createHandler()
    {
        return new CurlMultiHandler();
    }
}
