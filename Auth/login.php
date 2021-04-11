<?php
require 'vendor/autoload.php';
use Auth0\SDK\Auth0;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('.');
$dotenv->load();

$auth0 = new Auth0([
    'domain'        => $_ENV['AUTH0_DOMAIN'],
    'client_id'     => $_ENV['AUTH0_CLIENT_ID'],
    'client_secret' => $_ENV['AUTH0_CLIENT_SECRET'],
    'redirect_uri'  => $_ENV['AUTH0_CALLBACK_URL'],
    'scope'         => 'openid profile email',
  ]);

$auth0->login();