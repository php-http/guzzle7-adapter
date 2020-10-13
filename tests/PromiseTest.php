<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use Exception;
use GuzzleHttp\Promise\RejectedPromise;
use Http\Adapter\Guzzle7\Promise;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class PromiseTest extends TestCase
{
    public function testNonDomainExceptionIsHandled(): void
    {
        $this->expectException(Exception::class);

        $request = $this->prophesize(RequestInterface::class);
        $promise = new RejectedPromise(new Exception());

        $guzzlePromise = new Promise($promise, $request->reveal());

        $guzzlePromise->wait();
    }
}
