<?php

namespace victorap93\OAuth2Token\Microsoft;

class Grap
{
    private $scope;
    private $token;
    private $permissions;

    public function __construct($tenant_id, $client_id, $client_secret, $grant_type, $permissions = ['.default'])
    {
        $this->scope = "https://graph.microsoft.com/";
        $this->token = new Token($tenant_id, $client_id, $client_secret, $grant_type);
        $this->permissions = $permissions;
    }

    public function getToken() 
    {
        $this->token->getToken(implode(" ", array_map([$this, 'createScope'], $this->permissions)));
    }

    private function createScope($permissions)
    {
        return $this->scope . $permissions;
    }
}
