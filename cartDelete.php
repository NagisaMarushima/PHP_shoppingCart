<?php require 'header.php'; ?>
<?php
unset($_SESSION['products'][$_REQUEST['id']]['count']);
unset($_SESSION['products'][$_REQUEST['id']]);
echo 'カートから商品を削除しました。';
echo '<hr>';
echo '<a href="cart.php"><p>カートに戻る</p></a>'
?>
<?php require 'footer.php'; ?>
