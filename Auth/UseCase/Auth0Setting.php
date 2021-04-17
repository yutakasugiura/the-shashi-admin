<?php

namespace Auth\UseCase;

require 'vendor/autoload.php';

use Auth0\SDK\Auth0;
use Dotenv\Dotenv;

class Auth0Setting {

  /**
   * login
   *
   * @return void
   */
  public function login(): void
  {   
    $auth0 = $this->accessAuth0();
    $auth0->login();
  }

  /**
   * logout
   *
   * @return void
   */
  public function logout(): void
  {
    $auth0 = $this->accessAuth0();
    $auth0->logout();
    header('Location: ' . 'http://localhost:3000/');
    die();
  }

  public function getUser(): ?array
  {
    $auth0 = $this->accessAuth0();
    $user = $auth0->getUser();

    return $user ?? null;
  }

  /**
   * Generate auth0 instance
   *
   * @return Auth0
   */
  private function accessAuth0(): Auth0
  {
    $dotenv = Dotenv::createImmutable('.');
    $dotenv->load();

    return new Auth0([
      'domain'        => $_ENV['AUTH0_DOMAIN'],
      'client_id'     => $_ENV['AUTH0_CLIENT_ID'],
      'client_secret' => $_ENV['AUTH0_CLIENT_SECRET'],
      'redirect_uri'  => $_ENV['AUTH0_CALLBACK_URL'],
      'scope'         => 'openid profile email',
    ]);
  }
}