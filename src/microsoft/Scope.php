<?php

namespace victorap93\OAuth2Token\Microsoft;

class Scope
{
    public static function createScope($scope, $permission)
    {
        return $scope . $permission;
    }
}
