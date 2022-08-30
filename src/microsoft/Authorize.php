<?php

namespace victorap93\OAuth2Token\Microsoft;

class Authorize
{
    private $tenant_id;
    private $client_id;

    public function __construct($tenant_id, $client_id)
    {
        $this->tenant_id = $tenant_id;
        $this->client_id = $client_id;
    }

    public function getCode($scope = ['.default'], $redirect_uri = 'http://localhost')
    {
        $client = new \GuzzleHttp\Client();

        $request = $client->get("https://login.microsoftonline.com/" . $this->tenant_id . "/oauth2/v2.0/authorize", [
            'query' => [
                'scope' => implode(" ", $scope),
                'client_id' => $this->client_id,
                'response_type' => 'code',
                'redirect_uri' => $redirect_uri
            ],
            'allow_redirects' => true
        ]);

        header("Location: " . $request->getEffectiveUrl());
    }
}
