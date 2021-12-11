<?php

declare(strict_types = 1);

namespace App\Http;

use Slim\Psr7\Response;
use Fig\Http\Message\StatusCodeInterface;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Headers;

class JsonResponse extends Response
{
    public function __construct(
        $data,
        int $status = StatusCodeInterface::STATUS_OK
    ) {
        parent::__construct(
            $status,
            new Headers(['Content-Type' => 'application/json']),
            (new StreamFactory())->createStream(\json_encode($data, JSON_THROW_ON_ERROR))
        );
    }
}
