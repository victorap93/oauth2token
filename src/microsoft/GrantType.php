<?php

namespace victorap93\OAuth2Token\Microsoft;

class GrantType
{
    public static function password($username, $password)
    {
        return [
            'grant_type' => 'password',
            'username' => $username,
            'password' => $password
        ];
    }
}
