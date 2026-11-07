<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

use WumxLabs\NoxAeApi\Http\HttpClient;

abstract class AbstractModule
{
    protected HttpClient $http;

    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }
}
