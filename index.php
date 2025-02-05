<?php require "header.php" ?>

<div class="hero"></div>


<section class="s1">
  <a href="detail.php?=5"><p>サマーシトラス</p></a>
  <a href=""><p>ドーナツのある生活</p></a>
  <a href="menu.php"><p>商品一覧</p></a>
</section>

<section class="s2">
    <!-- CSSで背景設定 -->
  <p>

    <span>Philosophy</span><br>
    <span>私たちの信念</span><br><br>

    <span>"Creating Connection"</span><br>
    <span>「ドーナツでつながる」</span>

  </p>
</section>

<section class="s3">
  <h1>人気ランキング</h1>
    <ol class="rankcl">
      <?php
      $pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8','ccStaff','ccDonuts');
      $x=1;

      foreach ($pdo ->query('select * from ranking')as $row){
        if ( $x>6 ) { // 指定した数とマッチしたら終了
          break;
        } else { // 指定した数とマッチしなかったら表示
          $id = $row["id"];
        echo 
        "<div>
          <li><span class='rank rank$x'>$x</span>
          <img src='images/donuts"."$row[id]".".png'>

          <a href='detail.php?id="."$id"."'>
            <span class='itmName'>$row[name]</span>
          </a><br>


          <span class='tax'>税込 ¥$row[price]</span>";


          echo "<a href='cart.php?id=".$id."&count=1&name="."$row[name]"."&price="."$row[price]"."'>
                  <p>カートに入れる</p>
                </a>
          
        </div>";
      }
      $x++; // カウントの追加
      }
      ?>
    </ol>
  </section>
<?php require "footer.php" ?>