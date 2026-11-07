# NoxAeApi PHP SDK

Official PHP SDK for the NoxAeApi Minecraft REST API suite and Velocity Network Hub.

## Features

- **PHP 8.1+** with strict types and PSR-4 standard autoloading
- Zero external dependencies (built on standard PHP `curl` and `json` extensions)
- Full module coverage:
  - Players, Server, Economy, Leaderboards, LuckPerms, NoxAuth
  - Plugins, Worlds, Skills, Identity, Integrations (RankForge, etc.), Misc
- Velocity Hub Node routing support via `$client->hubNode('server-1')`

## Installation

```bash
composer require wumx-labs/noxaeapi-sdk-php
```

## Quick Start

```php
use WumxLabs\NoxAeApi\Client;

$client = new Client('your-api-key', 'http://localhost:8080');

// Get online players
$players = $client->players->getOnline();
print_r($players);

// Server stats
$info = $client->server->getInfo();
echo "TPS: " . $info['tps'] . PHP_EOL;

// Forward request to specific backend via Velocity Hub
$hubNode = $client->hubNode('survival-1');
$survivalPlayers = $hubNode->players->getOnline();
```

## License

MIT © Wumx Labs & NoxAeApi Contributors
