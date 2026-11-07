<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class LeaderboardModule extends AbstractModule
{
    public function getSources(): array
    {
        return $this->http->get('/leaderboard/sources');
    }

    public function get(string $source, int $limit = 10, int $offset = 0): array
    {
        return $this->http->get("/leaderboard/{$source}", [
            'limit' => $limit,
            'offset' => $offset,
        ]);
    }
}
