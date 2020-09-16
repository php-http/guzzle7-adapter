<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use GuzzleHttp\Handler\CurlMultiHandler;

/**
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
class MultiCurlHttpAsyncAdapterTest extends HttpAsyncAdapterTest
{
    /**
     * {@inheritdoc}
     */
    protected function createHandler()
    {
        return new CurlMultiHandler();
    }
}
