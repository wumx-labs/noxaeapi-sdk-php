<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

use WumxLabs\NoxAeApi\Http\HttpClient;

class IntegrationsModule extends AbstractModule
{
    public RankForgeModule $rankForge;

    public function __construct(HttpClient $http)
    {
        parent::__construct($http);
        $this->rankForge = new RankForgeModule($http);
    }

    public function get(string $plugin, string $endpoint, array $queryParams = []): mixed
    {
        return $this->http->get("/integrations/{$plugin}/" . ltrim($endpoint, '/'), $queryParams);
    }

    public function post(string $plugin, string $endpoint, ?array $body = null): mixed
    {
        return $this->http->post("/integrations/{$plugin}/" . ltrim($endpoint, '/'), $body);
    }
}
