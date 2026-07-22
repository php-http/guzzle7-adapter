<?php

declare(strict_types=1);

namespace Http\Adapter\Guzzle7\Tests;

use GuzzleHttp\Exception as GuzzleExceptions;
use Http\Adapter\Guzzle7\Exception\UnexpectedValueException;
use Http\Adapter\Guzzle7\Promise;
use Http\Client\Exception\HttpException;
use Http\Client\Exception\NetworkException;
use Http\Client\Exception\RequestException;
use Http\Client\Exception\TransferException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author George Mponos <gmponos@gmail.com>
 */
final class PromiseExceptionTest extends TestCase
{
    /**
     * @dataProvider exceptionThatIsThrownForGuzzleExceptionProvider
     */
    #[DataProvider('exceptionThatIsThrownForGuzzleExceptionProvider')]
    public function testExceptionThatIsThrownForGuzzleException(
        RequestInterface $request,
        $reason,
        string $adapterExceptionClass
    ): void {
        $guzzlePromise = new \GuzzleHttp\Promise\Promise();
        $guzzlePromise->reject($reason);
        $promise = new Promise($guzzlePromise, $request);
        $this->expectException($adapterExceptionClass);
        $promise->wait();
    }

    public static function exceptionThatIsThrownForGuzzleExceptionProvider(): iterable
    {
        $request = (new PromiseExceptionTest('request'))->getMockBuilder(RequestInterface::class)->getMock();
        $response = (new PromiseExceptionTest('response'))->getMockBuilder(ResponseInterface::class)->getMock();


        yield [$request, new GuzzleExceptions\ConnectException('foo', $request), NetworkException::class];

        yield [$request, new GuzzleExceptions\TooManyRedirectsException('foo', $request, $response), RequestException::class];

        yield [$request, new GuzzleExceptions\RequestException('foo', $request, $response), HttpException::class];

        yield [$request, new GuzzleExceptions\BadResponseException('foo', $request, $response), HttpException::class];

        yield [$request, new GuzzleExceptions\ClientException('foo', $request, $response), HttpException::class];

        yield [$request, new GuzzleExceptions\ServerException('foo', $request, $response), HttpException::class];

        yield [$request, new GuzzleExceptions\TransferException('foo'), TransferException::class];

        // check cases without response
        yield [$request, new GuzzleExceptions\RequestException('foo', $request), RequestException::class];

        yield [$request, new GuzzleExceptions\BadResponseException('foo', $request, $response), RequestException::class];

        yield [$request, new GuzzleExceptions\ClientException('foo', $request, $response), RequestException::class];

        yield [$request, new GuzzleExceptions\ServerException('foo', $request, $response), RequestException::class];

        // Non PSR-18 Exceptions thrown
        yield [$request, new \Exception('foo'), TransferException::class];

        yield [$request, new \Error('foo'), TransferException::class];

        yield [$request, 'whatever', UnexpectedValueException::class];
    }
}
