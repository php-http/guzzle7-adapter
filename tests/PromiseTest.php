<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use GuzzleHttp\Promise\RejectedPromise;
use Http\Adapter\Guzzle7\Promise;
use PHPUnit\Framework\TestCase;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class PromiseTest extends TestCase
{
    /**
     * @expectedException \Exception
     */
    public function testNonDomainExceptionIsHandled()
    {
        $request = $this->prophesize('Psr\Http\Message\RequestInterface');
        $promise = new RejectedPromise(new \Exception());

        $guzzlePromise = new Promise($promise, $request->reveal());

        $guzzlePromise->wait();
    }
}
