<?php

namespace victorap93\OAuth2Token\Microsoft;

class GrantType
{
    public function clientCredentials()
    {
        return [
            'grant_type' => 'client_credentials'
        ];
    }

    public function password($username, $password)
    {
        return [
            'grant_type' => 'password',
            'username' => $username,
            'password' => $password
        ];
    }
}
