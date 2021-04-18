<?php

namespace Auth;

require 'vendor/autoload.php';

use Auth\UseCase\Auth0Setting;

class AuthRouter
{
    public function handle(): void
    {
        $auth0 = new Auth0Setting();
        $route = $_POST['routerStatus'];

        if ($route === 'login') {
            $auth0->login();
        } elseif ($route === 'logout') {
            $auth0->logout();
        } else {
            header('Location: ' . 'http://localhost:3000/');
        }
    }
}

$router = new AuthRouter();
$router->handle();