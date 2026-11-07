<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class NoxAuthModule extends AbstractModule
{
    public function getPlayer(string $uuid): array
    {
        return $this->http->get("/noxauth/players/{$uuid}");
    }

    public function checkPassword(string $name, string $password): array
    {
        return $this->http->post('/noxauth/check-password', [
            'name' => $name,
            'password' => $password,
        ]);
    }

    public function setPassword(string $uuid, string $password): array
    {
        return $this->http->post("/noxauth/players/{$uuid}/password", ['password' => $password]);
    }

    public function register(string $name, string $password, ?string $email = null): array
    {
        return $this->http->post('/noxauth/register', [
            'name' => $name,
            'password' => $password,
            'email' => $email,
        ]);
    }

    public function unregister(string $uuid): array
    {
        return $this->http->delete("/noxauth/players/{$uuid}");
    }
}
