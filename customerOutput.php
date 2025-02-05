<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8','ccStaff','ccDonuts');


if (isset($_SESSION['customers'])) {
	$id=$_SESSION['customers']['id'];
	$sql=$pdo->prepare('select * from customers where id!=? and mail=?');
	$sql->execute([$id, $_REQUEST['mail']]);
} else {
	$sql=$pdo->prepare('select * from customers where mail=?');
	$sql->execute([$_REQUEST['mail']]);
}
if (empty($sql->fetchAll())) {
	if (isset($_SESSION['customers'])) {
		$sql=$pdo->prepare('update customers set name=?, address=?, '.
			'mail=?, password=? ,furigana=?,postcode_a=?,postcode_b=? where id=?');
		$sql->execute([
			$_REQUEST['name'], $_REQUEST['address'], 
			$_REQUEST['mail'], $_REQUEST['password'],
			$_REQUEST['postcode_a'], $_REQUEST['postcode_b'],$_REQUEST['furigana'], $id]);
		$_SESSION['customers']=[
			'id'=>$id, 'name'=>$_REQUEST['name'], 
			'address'=>$_REQUEST['address'], 'mail'=>$_REQUEST['mail'], 
			'password'=>$_REQUEST['password'],
			'postcode_a'=>$_REQUEST['postcode_a'], 'postcode_b'=>$_REQUEST['postcode_b'],'furigana'=>$_REQUEST['furigana']];
		echo 'お客様情報を更新しました。';
	} else {
		$sql=$pdo->prepare('insert into customers values(null,?,?,?,?,?,?,?)');
		$sql->execute([
			$_REQUEST['name'],$_REQUEST['furigana'],
			$_REQUEST['postcode_a'],$_REQUEST['postcode_b'],
			$_REQUEST['address'], $_REQUEST['mail'], $_REQUEST['password']]);
echo '<p class="loginFinish">会員登録が完了いたしました。<br>';
echo 'ログインページへお進みください。</p>';
echo '<a href="cardInput.php">クレジットカード登録へ進む</a><br>';
echo '<a href="index.php">Topページへ戻る</a>';
	}
} else {
	echo 'アカウント情報が既にあります。';
}
?>
<?php require 'footer.php'; ?>
