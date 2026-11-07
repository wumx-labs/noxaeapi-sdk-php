<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class MiscModule extends AbstractModule
{
    public function ping(): array
    {
        return $this->http->get('/ping');
    }

    public function health(): array
    {
        return $this->http->get('/health');
    }
}
