<?php require 'header.php'; ?>
<?php
if (isset($_SESSION['customers'])) {
	unset($_SESSION['customers']);
	unset($_SESSION['card']);
	echo 'ログアウトしました。';
} else {
	echo 'すでにログアウトしています。';
}
?>
<?php require 'footer.php'; ?>
