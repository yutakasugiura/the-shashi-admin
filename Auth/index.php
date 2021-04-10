<?php
  setcookie("_authS", "sessionId=sD7^2as__*s&sajkhAx83", time()+60*60*24);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<div class="loginform">
  <form action="auth.php" method="post">
    <ul>
    <li>name <input name="name" type="text" autocomplete="off"></li>
    <li>pass <input name="password" type="text" autocomplete="off"></li>
    <li><input type="submit"></li>
    </ul>
  </form>
  <?php echo $message ?? 'msg' ?>
</div>
</body>
</html>