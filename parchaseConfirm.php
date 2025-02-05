<?php require "header.php" ?>
<h1>ご購入確認</h1>

<h3>ご購入商品</h3>
<?php
$sumCount =$sumPrice=0;
echo '<div class="confirm">';
foreach ($_SESSION['products'] as $id=>$product) {
echo '<ol>';
echo	'<li><span>商品名</span>'.$product['name'].'</li>';
echo	'<li><span>数量</span>'.$product['count'].'</li>';
echo	'<li><span>金額</span>'.$product['price'].'</li>';
echo '</ol><br>';

$sumCount +=$product['count'];
$sumPrice +=$product['count']*$product['price'];
}

echo '<ol>';
echo	'<li><span>合計数量</span>'.$sumCount.'</li>';
echo	'<li><span>合計金額</span>'.$sumPrice.'</li>';
echo '</ol><br>';


if(isset($_SESSION['customers'])){
echo '<ol>';
echo	'<li><span>お名前</span>'.$_SESSION['customers']['name'].'</li>';
echo	'<li><span>郵便番号</span>'.str_pad($_SESSION['customers']['postcode_a'], 3, '0', STR_PAD_LEFT);
echo   str_pad($_SESSION['customers']['postcode_b'], 4, '0', STR_PAD_LEFT).'</li>';
echo	'<li><span>住所</span>'.$_SESSION['customers']['address'].'</li>';
echo '</ol><br>';
}else{
	echo '<a href="loginInput.php"><p>こちらでログインしてください</p></a>';
}
?>
<h3>お支払方法</h3>

<?php
if(isset($_SESSION['card'])){

	echo '<ol>';
	echo	'<li><span>お支払</span>クレジットカード</li>';
	echo	'<li><span>ブランド</span>'.$_SESSION['card']['brand'].'</li>';
	echo '</ol><br>';
	echo '</div>';
	echo '<a href="parchaseComplete.php"><p class="inputForm">購入を確認する</p></a><br>';


}else{
	echo '<div class="cardInsert"><a href="cardInput.php"><p class="inputForm">カード情報登録する</p></a>';

	echo '<p class="cardInform">カード情報登録がまだのお客様はこちらへお進みください。</p></div>';
}
?>
<?php require "footer.php" ?>