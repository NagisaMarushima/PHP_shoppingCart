<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="common/reset.css">
  <link rel="stylesheet" href="styles/style.css">
<?php
// セッションに入っているユーザー名をゲストさんに表示する
// ページ遷移ごとに、セッションに階層を書いていく。
?>
</head>
<body>
  <header>
    <nav>
        <div class=gMenu>
        <input class="menuBtn" type="checkbox" id="menuBtn">
          <label class="menuIcon" for="menuBtn">
            <span class="navicon"></span>
          </label>
        <ul class="menu">
          <img src="images/ccdLogo.png" alt="ロゴマーク">
          <li><a href="index.php">Top</a></li>
          <li><a href="menu.php">商品一覧</a></li>
          <li><a href="#">よくある質問</a></li>
          <li><a href="#">問い合わせ</a></li>
          <li><a href="#">当サイトのポリシー</a></li>
        </ul>
        </div>

      <span class="modified"></span>

      <img src="images/ccdLogo.png" alt="ロゴマーク">
        
      <div>
        <div><a href="loginInput.php"><img src="images/Login.png" alt="ログイン"></a></div>
        <div><a href="cart.php"><img src="images/Cart.png" alt="カート"></a></div>
      </div>

    </nav>


    <form action="" method="get">
      <input type="image" src="images/search.png">
      <input type="text" name="search">
    </form>

  </header>
<main>
<p class="pan">Top<?php ?></p>
<p class="welcome pan">ようこそ

  <?php if(isset($_SESSION['customers']['name'])){
      echo $_SESSION['customers']['name'];
    }else{
      echo 'ゲスト';
    } ?>
    
  様</p>