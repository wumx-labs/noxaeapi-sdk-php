<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class RankForgeModule extends AbstractModule
{
    public function getPlayerStats(string $uuid): array
    {
        return $this->http->get("/integrations/rankforge/players/{$uuid}");
    }

    public function getPoints(string $uuid): array
    {
        return $this->http->get("/integrations/rankforge/players/{$uuid}/points");
    }

    public function setPoints(string $uuid, int $points): array
    {
        return $this->http->post("/integrations/rankforge/players/{$uuid}/points", ['points' => $points]);
    }

    public function addPoints(string $uuid, int $points): array
    {
        return $this->http->post("/integrations/rankforge/players/{$uuid}/points/add", ['points' => $points]);
    }

    public function removePoints(string $uuid, int $points): array
    {
        return $this->http->post("/integrations/rankforge/players/{$uuid}/points/remove", ['points' => $points]);
    }

    public function getTiers(): array
    {
        return $this->http->get('/integrations/rankforge/tiers');
    }

    public function getTop(int $limit = 10, int $offset = 0): array
    {
        return $this->http->get('/integrations/rankforge/top', [
            'limit' => $limit,
            'offset' => $offset,
        ]);
    }

    public function save(): array
    {
        return $this->http->post('/integrations/rankforge/save');
    }
}
