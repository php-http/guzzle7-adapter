<?php

declare(strict_types=1);

use Http\Adapter\Guzzle7\Client;
use Http\Client\Tests\HttpClientTest;
use Psr\Http\Client\ClientInterface;

/**
 * @author David Buchmann <mail@davidbu.ch>
 */
class DefaultHttpAdapterWithConfigTest extends HttpClientTest
{
    protected function createHttpAdapter(): ClientInterface
    {
        $reflected = new \ReflectionClass(HttpClientTest::class);
        $property = $reflected->getProperty('defaultHeaders');

        if($property->isStatic()) {
            self::$defaultHeaders['X-Test'] = 'configuration-value';
        } else {
            $this->$defaultHeaders['X-Test'] = 'configuration-value';
        }

        return Client::createWithConfig([
            'headers' => [
                'X-Test' => 'configuration-value',
            ],
        ]);
    }
}
