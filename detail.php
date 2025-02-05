<?php require "header.php" ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8','ccStaff','ccDonuts');
$sql=$pdo->prepare('select * from products where id=?');
$sql->execute([$_REQUEST['id']]);

foreach ($sql as $row) {
	echo '<div class="itemDetail">';

	echo "<img src='images/donuts$row[id].png'>";

  echo '<div><p class="itemName">商品名：', $row['name'], '</p><hr>';

  echo '<p>商品番号：', $row['introduction'], '</p><hr>';
  echo '<p class="tax">税込 ¥', $row['price'], '</p>';
	echo '<div class="itemform"><form action="cart.php" method="post">';
	echo '<select name="count">';
	for ($i=1; $i<=10; $i++) {echo '<option value="', $i, '">', $i, '</option>';}
	echo '</select>個';

	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<input type="hidden" name="name" value="', $row['name'], '">';
	echo '<input type="hidden" name="price" value="', $row['price'], '">';
	
	echo '<input type="submit" value="カートに入れる" class="cartIn">';
	
	echo '</form>';

	echo '<form action="detail.php" ><button name="favorite">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<img src="images/heart.png"></button>';

if(!isset($_SESSION['favorite'][$_REQUEST['id']])){
$pdo=new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8','ccStaff', 'ccDonuts');
$sql=$pdo->prepare('insert into favorite values(?, ?)');
if (isset($_SESSION['customers']['id'])){
if ($sql->execute([ $_SESSION['customers']['id'] ,$row['id']])){
											echo 'お気に入り追加済み';
											$_SESSION['favorite'][$row['id']] =["true"];
										} else {
									echo '追加に失敗しました。';
									}}}else{
										echo 'お気に入り追加済み';			
									}
echo '</div>
	</div>
	</div>';
}?>
<?php require "footer.php" ?>