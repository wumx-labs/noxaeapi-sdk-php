<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class PluginsModule extends AbstractModule
{
    public function getAll(): array
    {
        return $this->http->get('/plugins');
    }

    public function get(string $name): array
    {
        return $this->http->get("/plugins/{$name}");
    }

    public function enable(string $name): array
    {
        return $this->http->post("/plugins/{$name}/enable");
    }

    public function disable(string $name): array
    {
        return $this->http->post("/plugins/{$name}/disable");
    }
}
