<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class SkillsModule extends AbstractModule
{
    public function getPlayerSkills(string $uuid): array
    {
        return $this->http->get("/skills/players/{$uuid}");
    }

    public function getPlayerSkill(string $uuid, string $skill): array
    {
        return $this->http->get("/skills/players/{$uuid}/{$skill}");
    }

    public function addExp(string $uuid, string $skill, float $exp): array
    {
        return $this->http->post("/skills/players/{$uuid}/{$skill}/add-exp", ['exp' => $exp]);
    }

    public function setLevel(string $uuid, string $skill, int $level): array
    {
        return $this->http->post("/skills/players/{$uuid}/{$skill}/set-level", ['level' => $level]);
    }
}
