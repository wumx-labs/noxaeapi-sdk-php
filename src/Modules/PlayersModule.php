<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class PlayersModule extends AbstractModule
{
    public function getOnline(): array
    {
        return $this->http->get('/players');
    }

    public function get(string $uuid): array
    {
        return $this->http->get("/players/{$uuid}");
    }

    public function getOffline(string $uuid): array
    {
        return $this->http->get("/players/{$uuid}/offline");
    }

    public function getInventory(string $uuid): array
    {
        return $this->http->get("/players/{$uuid}/inventory");
    }

    public function getEnderChest(string $uuid): array
    {
        return $this->http->get("/players/{$uuid}/enderchest");
    }

    public function getStats(string $uuid): array
    {
        return $this->http->get("/players/{$uuid}/stats");
    }

    public function kick(string $uuid, string $reason = 'Kicked by an operator'): array
    {
        return $this->http->post("/players/{$uuid}/kick", ['reason' => $reason]);
    }

    public function ban(string $uuid, string $reason = 'Banned from server', ?string $expires = null): array
    {
        return $this->http->post("/players/{$uuid}/ban", [
            'reason' => $reason,
            'expires' => $expires,
        ]);
    }

    public function unban(string $uuid): array
    {
        return $this->http->post("/players/{$uuid}/unban");
    }

    public function setWhitelist(string $uuid, bool $whitelisted): array
    {
        return $this->http->post("/players/{$uuid}/whitelist", ['whitelisted' => $whitelisted]);
    }

    public function teleport(string $uuid, float $x, float $y, float $z, ?string $world = null): array
    {
        return $this->http->post("/players/{$uuid}/teleport", [
            'x' => $x,
            'y' => $y,
            'z' => $z,
            'world' => $world,
        ]);
    }

    public function sendMessage(string $uuid, string $message): array
    {
        return $this->http->post("/players/{$uuid}/message", ['message' => $message]);
    }

    public function setHealth(string $uuid, float $health): array
    {
        return $this->http->post("/players/{$uuid}/health", ['health' => $health]);
    }

    public function setFood(string $uuid, int $food, float $saturation = 5.0): array
    {
        return $this->http->post("/players/{$uuid}/food", [
            'food' => $food,
            'saturation' => $saturation,
        ]);
    }

    public function setOp(string $uuid, bool $op): array
    {
        return $this->http->post("/players/{$uuid}/op", ['op' => $op]);
    }

    public function setGamemode(string $uuid, string $gamemode): array
    {
        return $this->http->post("/players/{$uuid}/gamemode", ['gamemode' => $gamemode]);
    }
}
