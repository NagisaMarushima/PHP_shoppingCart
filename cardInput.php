<?php require 'header.php'; ?>
<?php

// ページ未完のためカード情報は
//ページ読み込みと同時に自動的に入力されます

$_SESSION['card']=[
  'name'=>"ドーナツ太郎",
  'number'=>'1234567890123456',
  'brand'=>'visa',
  'varified_month' => '02', 
  'varified_year' => '28' ,
  'security_code' =>'888'
]
?>
<h1>入力情報確認</h1>
<form action="cardConfirm.php">
  <ol>
    <li>
お名前<span class="indeed">必須</span>
<input type="textbox" size="25" name="name" value="<?php echo $_SESSION['card']['name']?>"class="customer">
</li>
<li>
カード番号<span class="indeed">必須</span>
<input type="textbox" size="25" name="number" value="<?php echo $_SESSION['card']['number']?>"class="customer">
</li>
<li>カード会社<span class="indeed">必須</span>
<input type="radio" name="brand"><label for="brand">JCB</label>
<input type="radio" name="brand"><label for="brand" checked>Visa</label>
<input type="radio" name="brand"><label for="brand">Master Card</label></li>
<li>有効期限<span class="indeed">必須</span>
<input type="textbox" size="4" name="varified_month" value="<?php echo $_SESSION['card']['varified_month']?>"class="customer">
<input type="textbox" size="4" name="varified_year" value="<?php echo $_SESSION['card']['varified_year']?>"class="customer"></li>
<li>セキュリティコード<span class="indeed">必須</span>
<input type="textbox" size="25" name="security_code" value="<?php echo $_SESSION['card']['security_code']?>"class="customer"></li>

<input type="submit" class="inputForm" value="入力確認する">
</form>
<p>

  <br>
  <a href="parchaseConfirm.php">購入確認ページヘ進む</a>
</p>
<?php require 'footer.php'; ?>
