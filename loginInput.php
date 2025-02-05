<?php require 'header.php'; ?>
<form action="loginOutput.php" method="post" class="loginFinish"">
メールアドレス<br><input class="customer" type="text" name="mail"><br>
パスワード<br><input class="customer" type="password" name="password"><br>
<input type="submit" value="ログイン" class="inputForm">
</form>
<p><a href="customerInput.php">会員登録はこちら</a></p>
<p><a href="logout.php">ログアウト</a></p>

<?php require 'footer.php'; ?>