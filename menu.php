<?php require "header.php" ?>

<h1>商品一覧</h1>

<h2>メインメニュー</h2>

<ol class="menucl">
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8','ccStaff','ccDonuts');
    $x=1;
    foreach ($pdo ->query('select * from products')as $row){
      if ( $x>6 ) { // 指定した数とマッチしたら終了
        break;
      } else { // 指定した数とマッチしなかったら表示
        $id = $row["id"];
        echo 
        "<div>
          <li>
          <img src='images/donuts"."$row[id]".".png'>
          <a href='detail.php?id="."$id"."'>
          <span class='itmName'>";if($row['is_new']===1){echo "【新作】";}echo "$row[name]</span>
          </a><br>
          
          <span class='tax'>税込み ¥$row[price]</span>

          <a href='cart.php?id=".$id."&count=1&name="."$row[name]"."&price="."$row[price]"."'>
          <p>カートに入れる</p>
          </a></li>
        </div>";
    }
    $x++; // カウントの追加
    }
    ?>
  </ol>
<!-- テーブルを変える -->
<h2>バラエティセット</h2>
<ol class="menucl">
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8','ccStaff','ccDonuts');
    $x=1;
    foreach ($pdo ->query('select * from products')as $row){
      
      
      if($x<7){
        // 何もしない
      }else if( 13<$x ) { // 指定した数とマッチしたら終了
        break;
      } else { // 指定した数とマッチしなかったら表示
        $id = $row["id"];
        echo 
        "<div><li><img src='images/donuts"."$row[id]".".png'>
          <a href='detail.php?id="."$id"."'>
            <span class='itmName'>$row[name]</span></a><br>
            <span class='tax'>税込み ¥$row[price]</span>
            <a href='cart.php?id=".$id."&count=1&name="."$row[name]"."&price="."$row[price]"."'>
            <p>カートに入れる</p>
          </a></li>
        </div>";
    }
    $x++; // カウントの追加
    }
    ?>
  </ol>
<!-- テーブルを変える -->
<?php require "footer.php" ?>