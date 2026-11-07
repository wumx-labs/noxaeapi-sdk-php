<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi;

use WumxLabs\NoxAeApi\Http\HttpClient;
use WumxLabs\NoxAeApi\Modules\EconomyModule;
use WumxLabs\NoxAeApi\Modules\IdentityModule;
use WumxLabs\NoxAeApi\Modules\IntegrationsModule;
use WumxLabs\NoxAeApi\Modules\LeaderboardModule;
use WumxLabs\NoxAeApi\Modules\LuckPermsModule;
use WumxLabs\NoxAeApi\Modules\MiscModule;
use WumxLabs\NoxAeApi\Modules\NoxAuthModule;
use WumxLabs\NoxAeApi\Modules\PlayersModule;
use WumxLabs\NoxAeApi\Modules\PluginsModule;
use WumxLabs\NoxAeApi\Modules\RankForgeModule;
use WumxLabs\NoxAeApi\Modules\ServerModule;
use WumxLabs\NoxAeApi\Modules\SkillsModule;
use WumxLabs\NoxAeApi\Modules\WorldsModule;

class HubNodeClient
{
    private HttpClient $http;
    private string $nodeId;

    public PlayersModule $players;
    public ServerModule $server;
    public EconomyModule $economy;
    public LeaderboardModule $leaderboard;
    public LuckPermsModule $luckperms;
    public NoxAuthModule $noxauth;
    public PluginsModule $plugins;
    public WorldsModule $worlds;
    public SkillsModule $skills;
    public IdentityModule $identity;
    public IntegrationsModule $integrations;
    public RankForgeModule $rankforge;
    public MiscModule $misc;

    public function __construct(HttpClient $http, string $nodeId)
    {
        $this->nodeId = $nodeId;
        $this->http = $http->withHeader('X-Velocity-Node', $nodeId);

        $this->players = new PlayersModule($this->http);
        $this->server = new ServerModule($this->http);
        $this->economy = new EconomyModule($this->http);
        $this->leaderboard = new LeaderboardModule($this->http);
        $this->luckperms = new LuckPermsModule($this->http);
        $this->noxauth = new NoxAuthModule($this->http);
        $this->plugins = new PluginsModule($this->http);
        $this->worlds = new WorldsModule($this->http);
        $this->skills = new SkillsModule($this->http);
        $this->identity = new IdentityModule($this->http);
        $this->integrations = new IntegrationsModule($this->http);
        $this->rankforge = $this->integrations->rankForge;
        $this->misc = new MiscModule($this->http);
    }

    public function getNodeId(): string
    {
        return $this->nodeId;
    }
}
