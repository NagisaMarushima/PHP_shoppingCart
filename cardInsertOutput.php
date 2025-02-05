<?php require 'header.php'; ?>
<?php

// DBに情報を記入しています

$pdo=new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8', 
	'ccStaff', 'ccDonuts');
$sql=$pdo->prepare('insert into card_inform values(?, ?, ?, ?, ?, ?, ?)');
if ($sql->execute([ $_SESSION['customers']['id'] ,$_REQUEST['name'], $_REQUEST['number'],
										$_REQUEST['brand'], $_REQUEST['varified_month'],
										$_REQUEST['varified_year'], $_REQUEST['security_code']])) {
echo '<p class="loginFinish">支払情報登録が完了いたしました。<br>';
echo '続けて購入確認ページへお進みください。</p>';
echo '<a href="parchaseConfirm.php">購入確認ページへ進む</a><br>';
echo '<a href="index.php">Topページへ戻る</a>';
} else {
	echo '追加に失敗しました。';
}
?>
<?php require 'footer.php'; ?>