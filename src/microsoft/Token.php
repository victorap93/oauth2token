<?php

namespace victorap93\OAuth2Token\Microsoft;

use \GuzzleHttp\Client;

class Token
{
    private $tenant_id;
    private $client_id;
    private $client_secret;
    private $grant_type;

    public function __construct($tenant_id, $client_id, $client_secret, $grant_type)
    {
        $this->tenant_id = $tenant_id;
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        $this->grant_type = $grant_type;
    }

    public function get($scope = ['.default'])
    {
        $client = new Client();

        $request = $client->post("https://login.microsoftonline.com/" . $this->tenant_id . "/oauth2/v2.0/token", [
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
            'body' => array_merge(
                [
                    'scope' => implode(" ", $scope),
                    'client_id' => $this->client_id,
                    'client_secret' => $this->client_secret
                ],
                $this->grant_type
            )
        ]);

        return $request->getStatusCode() === 200 ? json_decode((string) $request->getBody()) : false;
    }
}
