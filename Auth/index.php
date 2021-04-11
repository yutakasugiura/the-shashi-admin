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

$userInfo = $auth0->getUser();

if (!$userInfo) {
    // We have no user info
    // See below for how to add a login link
} else {
    $isLogInSucceed = 'SUCCESS to Log In';
    $userName = $userInfo['name'];
    // User is authenticated
    // See below for how to display user information
}
echo $isLogInSucceed ?? 'Not Logged In';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<div class="loginform">
  <div><a href="login.php">Auth0 Log In</a></div>
  <?php echo $userName ?? '' ?>
  <?php if(!$userInfo): ?>
    Log Out
  <?php else: ?>
  <a href="/logout.php">Logout</a>
  <?php endif ?>
</div>
</body>
</html>