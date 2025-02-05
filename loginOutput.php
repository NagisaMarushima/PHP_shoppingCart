<?php require 'header.php'; ?>
<?php
unset($_SESSION['customers']);
$pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8','ccStaff','ccDonuts');
$sql=$pdo->prepare('select * from customers where mail=? and password=?');
$sql->execute([$_REQUEST['mail'], $_REQUEST['password']]);
foreach ($sql as $row) {
	$_SESSION['customers']=[
		'id'=>$row['id'], 'name'=>$row['name'], 
		'address'=>$row['address'], 'mail'=>$row['mail'], 
		'password'=>$row['password'],
		'postcode_a'=>$row['postcode_a'], 'postcode_b'=>$row['postcode_b'],
		'furigana'=>$row['furigana']
	];
}
if (isset($_SESSION['customers'])) {
	echo '<p class="loginFinish">ログインが完了いたしました。<br>';
	echo '引き続きお楽しみください。</p>';
	echo '<a href="parchaseConfirm.php">購入確認ページへ進む</a><br>';
	echo '<a href="index.php">Topページへ戻る</a>';
} else {
	echo '<p class="loginFinish">ログイン名またはパスワードが違います。</p>';
	echo '<a href="index.php">Topページへ戻る</a>';
}
?>
<?php require 'footer.php'; ?>