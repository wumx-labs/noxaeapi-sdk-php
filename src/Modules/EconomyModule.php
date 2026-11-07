<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class EconomyModule extends AbstractModule
{
    public function getInfo(): array
    {
        return $this->http->get('/economy');
    }

    public function getBalance(string $uuid): array
    {
        return $this->http->get("/economy/balance/{$uuid}");
    }

    public function setBalance(string $uuid, float $amount): array
    {
        return $this->http->post("/economy/balance/{$uuid}", ['amount' => $amount]);
    }

    public function addBalance(string $uuid, float $amount): array
    {
        return $this->http->post("/economy/balance/{$uuid}/add", ['amount' => $amount]);
    }

    public function removeBalance(string $uuid, float $amount): array
    {
        return $this->http->post("/economy/balance/{$uuid}/remove", ['amount' => $amount]);
    }

    public function getTop(int $limit = 10, int $offset = 0): array
    {
        return $this->http->get('/economy/top', [
            'limit' => $limit,
            'offset' => $offset,
        ]);
    }

    public function getCurrencyBalance(string $uuid, string $currency): array
    {
        return $this->http->get("/economy/{$currency}/balance/{$uuid}");
    }

    public function setCurrencyBalance(string $uuid, string $currency, float $amount): array
    {
        return $this->http->post("/economy/{$currency}/balance/{$uuid}", ['amount' => $amount]);
    }

    public function addCurrencyBalance(string $uuid, string $currency, float $amount): array
    {
        return $this->http->post("/economy/{$currency}/balance/{$uuid}/add", ['amount' => $amount]);
    }

    public function removeCurrencyBalance(string $uuid, string $currency, float $amount): array
    {
        return $this->http->post("/economy/{$currency}/balance/{$uuid}/remove", ['amount' => $amount]);
    }

    public function getCurrencyTop(string $currency, int $limit = 10, int $offset = 0): array
    {
        return $this->http->get("/economy/{$currency}/top", [
            'limit' => $limit,
            'offset' => $offset,
        ]);
    }
}
