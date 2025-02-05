<?PHP require 'header.php'?>
<?php
echo '<div class="customerConfirm">';
      echo '<p>お名前<br><span>'.$_SESSION['card']['name'].'</span></p>';
      echo '<p>カード番号<br><span>'.$_SESSION['card']['number'].'</span></p>';
      echo '<p>カード会社<br><span>'.$_SESSION['card']['brand'].'</span></p>';
      echo '<p>有効期限<br><span>'.$_SESSION['card']['varified_month'].'</span><br>
      <span>'.$_SESSION['card']['varified_year'].'</span></p>';
      echo '<p>セキュリティコード<br><span>'.$_SESSION['card']['security_code'].'</span></p>';
    echo '</div>';

    
    echo '<form action="cardInsertOutput.php" method="post">';
    echo '<input type="hidden" name="name" value="', $_SESSION['card']['name'], '">';
    echo '<input type="hidden" name="number" value="', $_SESSION['card']['number'], '">';
    echo '<input type="hidden" name="brand" value="', $_SESSION['card']['brand'], '">';
    echo '<input type="hidden" name="varified_month" value="', $_SESSION['card']['varified_month'], '">';
    echo '<input type="hidden" name="varified_year" value="', $_SESSION['card']['varified_year'], '">';
    echo '<input type="hidden" name="security_code" value="', $_SESSION['card']['security_code'], '">';
    echo '<input type="submit" value="登録する"></form>';
    ?>
<?php require 'footer.php'?>