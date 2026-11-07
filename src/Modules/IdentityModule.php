<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class IdentityModule extends AbstractModule
{
    public function resolve(string $name): array
    {
        return $this->http->get('/identity/resolve', ['name' => $name]);
    }

    public function getNetworkServers(): array
    {
        return $this->http->get('/identity/network/servers');
    }

    public function getNetworkPlayer(string $uuid): array
    {
        return $this->http->get("/identity/network/players/{$uuid}");
    }
}
