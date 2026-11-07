<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Modules;

class LuckPermsModule extends AbstractModule
{
    public function getGroups(): array
    {
        return $this->http->get('/luckperms/groups');
    }

    public function getGroup(string $name): array
    {
        return $this->http->get("/luckperms/groups/{$name}");
    }

    public function createGroup(string $name): array
    {
        return $this->http->post('/luckperms/groups', ['name' => $name]);
    }

    public function deleteGroup(string $name): array
    {
        return $this->http->delete("/luckperms/groups/{$name}");
    }

    public function getUserPermissions(string $uuid): array
    {
        return $this->http->get("/luckperms/users/{$uuid}/permissions");
    }

    public function addUserPermission(string $uuid, string $permission, bool $value = true, int $expiry = 0): array
    {
        return $this->http->post("/luckperms/users/{$uuid}/permissions", [
            'permission' => $permission,
            'value' => $value,
            'expiry' => $expiry,
        ]);
    }

    public function removeUserPermission(string $uuid, string $permission): array
    {
        return $this->http->delete("/luckperms/users/{$uuid}/permissions", ['permission' => $permission]);
    }

    public function getUserGroups(string $uuid): array
    {
        return $this->http->get("/luckperms/users/{$uuid}/groups");
    }

    public function addUserGroup(string $uuid, string $group): array
    {
        return $this->http->post("/luckperms/users/{$uuid}/groups", ['group' => $group]);
    }

    public function removeUserGroup(string $uuid, string $group): array
    {
        return $this->http->delete("/luckperms/users/{$uuid}/groups", ['group' => $group]);
    }

    public function getUserNodes(string $uuid): array
    {
        return $this->http->get("/luckperms/users/{$uuid}/nodes");
    }

    public function addUserNode(string $uuid, array $node): array
    {
        return $this->http->post("/luckperms/users/{$uuid}/nodes", $node);
    }

    public function removeUserNode(string $uuid, array $node): array
    {
        return $this->http->delete("/luckperms/users/{$uuid}/nodes", $node);
    }
}
