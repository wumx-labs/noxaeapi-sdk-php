<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class WorldsModule extends AbstractModule
{
    public function getAll(): array
    {
        return $this->http->get('/worlds');
    }

    public function get(string $name): array
    {
        return $this->http->get("/worlds/{$name}");
    }

    public function save(string $name): array
    {
        return $this->http->post("/worlds/{$name}/save");
    }

    public function setTime(string $name, int $time): array
    {
        return $this->http->post("/worlds/{$name}/time", ['time' => $time]);
    }

    public function setWeather(string $name, string $weather, int $duration = 6000): array
    {
        return $this->http->post("/worlds/{$name}/weather", [
            'weather' => $weather,
            'duration' => $duration,
        ]);
    }

    public function setDifficulty(string $name, string $difficulty): array
    {
        return $this->http->post("/worlds/{$name}/difficulty", ['difficulty' => $difficulty]);
    }
}
