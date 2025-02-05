<?php require 'header.php'; ?>
<?php

  unset($_SESSION['products']);
  echo '<p class="loginFinish">ご購入いただきありがとうございます<br>';
	echo '今後ともご愛顧の程、宜しくお願いいたします。</p>';
	echo '<a href="index.php">Topページへ進む</a>';
?>
<?php require 'footer.php'; ?>