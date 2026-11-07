<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class ServerModule extends AbstractModule
{
    public function getInfo(): array
    {
        return $this->http->get('/server');
    }

    public function getHealth(): array
    {
        return $this->http->get('/server/health');
    }

    public function getTPS(): array
    {
        return $this->http->get('/server/tps');
    }

    public function getPlugins(): array
    {
        return $this->http->get('/server/plugins');
    }

    public function getWorlds(): array
    {
        return $this->http->get('/server/worlds');
    }

    public function getBannedIps(): array
    {
        return $this->http->get('/server/banned-ips');
    }

    public function getBannedPlayers(): array
    {
        return $this->http->get('/server/banned-players');
    }

    public function getWhitelist(): array
    {
        return $this->http->get('/server/whitelist');
    }

    public function executeCommand(string $command): array
    {
        return $this->http->post('/server/command', ['command' => $command]);
    }

    public function broadcast(string $message): array
    {
        return $this->http->post('/server/broadcast', ['message' => $message]);
    }
}
