<?PHP require 'header.php'?>
<?php
$name = $_REQUEST['name'];
$address = $_REQUEST['address'];
$postcode_a=mb_convert_kana($_REQUEST['postcode_a'],'n');
$postcode_b=mb_convert_kana($_REQUEST['postcode_b'],'n');
$mail=mb_convert_kana($_REQUEST['mail'],'a');
$mail_confirm =mb_convert_kana($_REQUEST['mail_confirm'],'a');
$password=mb_convert_kana($_REQUEST['password'],'a');
$password_confirm=mb_convert_kana($_REQUEST['password_confirm'],'a');
$furigana = mb_convert_kana($_REQUEST['furigana']);


// if(isset($_REQUEST['name'])&&
//   isset($_REQUEST['address'])&&
//   isset($_REQUEST['mail'])&&
//   isset($_REQUEST['password'])&&
//   isset($_REQUEST['furigana'])&&
//   isset($_REQUEST['postcode_a'])&&
//   isset($_REQUEST['postcode_b'])&&
//   isset($_REQUEST['mail_confirm'])&&
//   isset($_REQUEST['password_confirm'])){

    if (!preg_match('/^[0-9]{3}$/', $postcode_a) && !preg_match('/^[0-9]{4}$/', $postcode_b)) {
      echo $postcode_a.'-'.$postcode_b, 'は適切な郵便番号ではありません。';
      return $postcodeTF = "false";
    }
    
    if (!preg_match("/\A([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+\z/", $mail)) {
      echo 'パスワード「', $mail, '」は適切ではありません。';
      return $mailTF = "false";
    }
    
    if (!preg_match('/^(?=.*[a-z])(?=.*[0-9])[a-z0-9]{8,20}$/', $password)) {
      echo 'パスワード「', $password, '」は適切ではありません。';
      return $passwordTF = "false";
    }
    
    // if (!preg_match(, $furigana)) {
    //   echo 'パスワード「', $furigana, '」は適切ではありません。';
    //   return $furiganaTF = "false";
    // }
    
    if ($mail !== $mail_confirm){
      echo 'メールアドレスとメールアドレス確認用が違います。';
      return $mailConfirmTF = "false";
    }
    
    if ($password !== $password_confirm){
      echo 'パスワードとパスワード確認用が違います。';
      return $passwordConfirmTF = "false";
    }
    
    
    
    
    // if($postcodeTF === 'true'&&$mailTF=== 'true'&&$passwordTF ==='true'&&$furiganaTF ==='true'&&$mailConfirmTF === 'true'&& $passwordConfirmTF === 'true'){
    // 確認のHTML
    echo '<div class="customerConfirm">';
      echo '<p>お名前<br><span>'.$name.'</span></p>';
      echo '<p>お名前(フリガナ)<br><span>'.$furigana.'</span></p>';
      echo '<p>郵便番号</span><br><span>'.$postcode_a.$postcode_b.'</span></p>';
      echo '<p>住所<br><span>'.$address. '</span></p>';
      echo '<p>メールアドレス<br><span>'.$mail.'</span></p>';
      echo '<p>メールアドレス(確認用)<br><span>'.$mail_confirm.'</span></p>';
      echo '<p>パスワード<br><span>'.$password.'</span></p>';
      echo '<p>パスワード(確認用)<br><span>'.$password_confirm.'</span></p>';
    echo '</div>';

    // 確認した記入事項を送信するフォーム

      echo '<form action="customerOutput.php" method="post">';
      echo '<input type="hidden" name="name" value="', $name, '">';
      echo '<input type="hidden" name="furigana" value="', $furigana, '">';
      echo '<input type="hidden" name="address" value="', $address, '">';
      echo '<input type="hidden" name="postcode_a" value="', $postcode_a, '">';
      echo '<input type="hidden" name="postcode_b" value="', $postcode_b, '">';
      echo '<input type="hidden" name="mail" value="', $mail, '">';
      echo '<input type="hidden" name="password" value="', $password, '">';
      echo '<input type="submit" value="登録する"></form>';
      
    // }else{
    //   require 'customer-form.php';
    // }

// }else{
//   echo '空欄があります。';
//   require 'customerForm.php';
  
// };
?>
<?php require 'footer.php'?>