# OAuth 2.0 Token

## Usage

```php
<?php

use Dotenv\Dotenv;
use victorap93\OAuth2Token\Microsoft;

require_once 'vendor/autoload.php';

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

// by Authorization code
if (!Microsoft\Authorize::getCode()) {
    $authorize = new Microsoft\Authorize($_ENV['TENANT_ID'], $_ENV['CLIENT_ID']);
    $refresh_token = $authorize->redirect(['IMAP.AccessAsUser.All', 'offline_access'], 'http://localhost');
} else {
    $grant_type = Microsoft\GrantType::authorization_code(Microsoft\Authorize::getCode(), 'http://localhost');
    $client = new Microsoft\Token($_ENV['TENANT_ID'], $_ENV['CLIENT_ID'], $_ENV['CLIENT_SECRET'], $grant_type);
    $client->getAccessToken(['IMAP.AccessAsUser.All', 'offline_access']);
}
```

```php
<?php

use Dotenv\Dotenv;
use victorap93\OAuth2Token\Microsoft;

require_once 'vendor/autoload.php';

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

// by Password
$grant_type = Microsoft\GrantType::password($_ENV['USERNAME'], $_ENV['PASSWORD']);
$client = new Microsoft\Client($_ENV['TENANT_ID'], $_ENV['CLIENT_ID'], $_ENV['CLIENT_SECRET'], $grant_type);
$token = $client->getToken(['IMAP.AccessAsUser.All', 'offline_access']);

$grant_type = Microsoft\GrantType::refresh_token($token->refresh_token);
$client = new Microsoft\Client($_ENV['TENANT_ID'], $_ENV['CLIENT_ID'], $_ENV['CLIENT_SECRET'], $grant_type);
$client->getToken(['IMAP.AccessAsUser.All', 'offline_access']);

```