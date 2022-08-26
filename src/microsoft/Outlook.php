<?php

namespace victorap93\OAuth2Token\Microsoft;

class Outlook
{
    private $scope;
    private $token;
    private $permissions;

    public function __construct($tenant_id, $client_id, $client_secret, $grant_type, $permissions = ['.default'])
    {
        $this->scope = "https://outlook.office.com/";
        $this->token = new Token($tenant_id, $client_id, $client_secret, $grant_type);
        $this->permissions = $permissions;
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
