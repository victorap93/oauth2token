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

    public function redirect($scope = ['.default'], $redirect_uri = 'http://localhost')
    {
        $query = http_build_query([
            'scope' => implode(" ", $scope),
            'client_id' => $this->client_id,
            'response_type' => 'code',
            'redirect_uri' => $redirect_uri
        ]);

        header("Location: " . "https://login.microsoftonline.com/" . $this->tenant_id . "/oauth2/v2.0/authorize?" . $query);
    }

    public function getCode()
    {
        return $_GET['code'];
    }
}
