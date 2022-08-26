<?php

namespace victorap93\OAuth2Token\Microsoft;

class PowerBI
{
    private $scope;
    private $token;

    public function __construct($tenant_id, $client_id, $client_secret, $grant_type)
    {
        $this->scope = "https://analysis.windows.net/powerbi/api";
        $this->token = new Token($tenant_id, $client_id, $client_secret, $grant_type);
    }

    public function getToken()
    {
        $scope = $this->scope;
        return $this->token->getToken(implode(" ", array_map(
            function ($item) use ($scope) {
                return Scope::createScope($scope, $item);
            },
            $this->permissions
        )));
    }
}
