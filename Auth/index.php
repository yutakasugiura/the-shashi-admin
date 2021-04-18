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

var_dump($user);

if ($user) {
    $img_url = '/static/png/jpg-success.jpg';
}

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
  <div class="icon-auth0">
      <img src="/static/png/icon-auth0.png">
  </div>
  <?php if(is_null($user)): ?>
    <div class="header-logout">ログアウト</div>
  <?php else: ?>
    <div class="header-login">
      <div>ログイン中: <?php echo htmlspecialchars($user['nickname']) ?></div>
    </div>
    <div class="header-login">
      <div><?php echo htmlspecialchars($user['role'] ?? 'Undefined Roles') ?></div>
    </div>
  <?php endif ?>
    <div class="content-login">
      <?php //ログイン失敗・未ログイン ?>
      <?php if(is_null($user)): ?>
        <form name="execute" method="POST" action="AuthRouter.php" >
          <h2><a href="javascript:document.execute.submit()">You can Login!</a></h2>
          <input type="hidden" name="routerStatus" value="login">
        </form>
        <div class="header-subtitle">ログインのためにAuth0の認証に接続します</div>
        <div class="header-subtitle">新規登録およびログインには2段階認証が必須です</div>
      <?php //ログイン成功時 ?>
      <?php else: ?>
        <img src="<?php echo htmlspecialchars($img_url) ?>" width="100%">
        <form name="execute" method="POST" action="AuthRouter.php" >
          <h2><a href="javascript:document.execute.submit()">You can Logout!</a></h2>
          <input type="hidden" name="routerStatus" value="logout">
        </form>
        <div class="header-subtitle">ログアウトのためにAuth0の認証に接続します</div>
        <!-- アクセスコントロールテスト -->
        <a href="UseCase/RejectAccess.php">Reject</a>
      <?php endif ?>
      <div class="memo-box">
          <h3>検証したいことメモ</h3>
          <div class="memo-list"><input type="checkbox">Auth0外のUserデータベースへの接続</div>
          <div class="memo-list"><input type="checkbox">権限管理（Auth0からどうやって引っ張るのか？）</div>
          <div class="memo-list"><input type="checkbox">phpからSPAへの認証移行</div>
          <div class="memo-list"><input type="checkbox" checked="checked">MFA（2段階認証の必須策定）</div>
          <div class="memo-list"><input type="checkbox">DB移行（migration）</div>
          <div class="memo-list"><input type="checkbox">Cognitoとの比較</div>
        </div>
    </div>
  </div>
  <div class="footer">
    <p>Auth0によるテスト環境</p>
    <p>トライ期間：2021年4月〜</p>
    <p>Author: Yutaka.Sugiura</p>
  <div>
</body>
</html>