<?php require "header.php" ?>
<?php require "cartInsert.php"?>
<?php
if (!empty($_SESSION['products'])) {

			$countTotal =0;
			$total=0;

			// カートに元から同じ商品があった場合の個数調整＆合計個数や金額計算
			if(isset($_REQUEST['count'])){

				foreach ($_SESSION['products'] as $id=>$product) {
				$countTotal +=$_SESSION['products'][$id]['count'];
				$subCount[$id] =$_SESSION['products'][$id]['count'];
				$total += $product['price']*$subCount[$id];}
			
			}else{
				foreach ($_SESSION['products'] as $id=>$product) {
					$countTotal +=$_SESSION['products'][$id]['count'];
					$subCount[$id] = $_SESSION['products'][$id]['count'];
				$total += $product['price']* $_SESSION['products'][$id]['count'];
			}}


			echo '<div class="total">現在 商品'.$countTotal.'個<br>';
			echo 'ご注文小計:<span class="tax">税込¥'.$total.'</span>';
			
			echo '<form action="parchaseConfirm.php" method="post">
							<input type="submit" value="購入確認ヘ進む" class="inputConfirm">
							</form>';

			echo	'</div>';

			// カート内商品をひとつづつHTMLにて出力
	foreach ($_SESSION['products'] as $id=>$product) {
		echo '<div class="itemDetail">';
		
		echo '<img src="images/donuts'.$id.'.png">';

		echo '<div>

					<p class="itemName">商品名：', $product['name'], '</p><hr>';
		echo '<p class="tax">税込 ¥', $product['price'], '</p>';
		echo '<form action="cart.php" class="calc">数量<select name="count">';
		
		echo '<option value="0">', $subCount[$id], '</option>';

		for ($i=1; $i<=10; $i++) {echo '<option value="', $i-$_SESSION['products'][$id]['count'], '">', $i, 
				 '</option>';}
  	echo '</select>個<br>';

		echo '<input type="hidden" name="id" value="', $product['id'], '">';
		echo '<input type="hidden" name="name" value="', $product['name'], '">';
		echo '<input type="hidden" name="price" value="', $product['price'], '">';

		echo '<button class="recalc">再計算</button></form>';
		echo '<a href="cartDelete.php?id=', $id, '"><span>削除する</span></a>
					</div>
					</div>';
		}

		//上の繰り返し 
		echo '<div class="total">現在 商品'.$countTotal.'個<br>';
		echo 'ご注文小計:<span class="tax">税込¥'.$total.'</span>';
	
		echo '<form action="parchaseConfirm.php" method="post">';
		echo '<input type="submit" value="購入確認ヘ進む" class="inputConfirm">
					</form>';

		echo	'</div>';

		echo '<a href="menu.php"><p class="inputForm cartInput">買い物を続ける</p></a>';


}else{
		echo '<p class="total">カートに商品がありません。</div>';
}
?>
<?php require "footer.php" ?>