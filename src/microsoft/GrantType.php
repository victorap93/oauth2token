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

    public static function refresh_token($refresh_token)
    {
        return [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token
        ];
    }

    public static function authorization_code($code, $redirect_uri)
    {
        return [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $redirect_uri
        ];
    }
}
