<?php

namespace Auth;

use Auth\UseCase\Auth0Setting;

require 'vendor/autoload.php';

class Index
{
  /**
   * 初回アクセス時にログイン判定を実施
   *
   * @return void
   */
  public function getUser(): ?array
  {
    $auth0Setting = new Auth0Setting();
    return $auth0Setting->getUser() ?? null;
  }
}
$index = new Index();
$user = $index->getUser();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/static/css/index.css">
<body>
  <div class="header">
    <h1>Auth0 Login Form</h1>
    <div class="header-subtitle">ノンフレームワークphp(7.x)によるAuth0テスト環境</div>
  </div>
  <div class="content">
  <?php if(is_null($user)): ?>
    <div class="header-logout">
        ログアウト
    </div>
  <?php else: ?>
    <div class="header-login">
      <div>ログイン中</div>
      <div><?php echo $user['name'] ?></div>
      <div><?php echo $user['role'] ?? '権限未設定' ?></div>
    </div>
  <?php endif ?>
    <div class="content-login">
      <?php if(is_null($user)): ?>
        <form name="execute" method="POST" action="AuthRouter.php" >
          <h2><a href="javascript:document.execute.submit()">You can Login!</a></h2>
          <input type="hidden" name="routerStatus" value="login">
        </form>
        <div class="header-subtitle">ログインのためにAuth0の認証に接続します</div>
        <div class="header-subtitle">新規登録およびログインには2段階認証が必須です</div>
      <?php else: ?>
        <img src="/static/png/icon-auth0.png" width="30%">
        <form name="execute" method="POST" action="AuthRouter.php" >
          <h2><a href="javascript:document.execute.submit()">You can Logout!</a></h2>
          <input type="hidden" name="routerStatus" value="logout">
        </form>
        <div class="header-subtitle">ログアウトのためにAuth0の認証に接続します</div>
      <?php endif ?>
    </div>
  </div>
</body>
</html>