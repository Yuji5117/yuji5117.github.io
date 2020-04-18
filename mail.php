<?php

session_start();

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

// HTML特殊文字をエスケープする関数
function escape($str) {
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

//前後にある半角全角スペースを削除する関数
function spaceTrim ($str) {
    // 行頭
    $str = preg_replace('/^[ 　]+/u', '', $str);
    // 末尾
    $str = preg_replace('/[ 　]+$/u', '', $str);
    return $str;
}

//tokenを変数に入れる
$token = $_POST['token'];

// トークンを確認し、確認画面を表示
if(!(hash_equals($token, $_SESSION['token']) && !empty($token))) {
    echo "不正アクセスの可能性があります";
    exit();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/mail.css">
    <title>sample</title>
</head>

<body>
    <?php
    mb_language("japanese");
    mb_internal_encoding("UTF-8");
    
    $to = "yuji6523ny@gmail.com";
    
    
    $name = $_SESSION['name']; 
    $tel = $_SESSION['tel']; 
    $from = $_SESSION['mail']; 
    $mail = $_SESSION['mail']; 
    $address = $_SESSION['address']; 
    $inquiry = $_SESSION['inquiry']; 
    
    $subject = "$name 様からのお問合せ";
    
    $body = "名前: $name\n".
    "メール: $mail\n".
    "電話番号: $tel\n".
    "住所: $address\n".
    "内容: $inquiry";
    
    
    $header = "From: $from";
        
    ?>

    <div class="mail">
        <?php if((mb_send_mail($to, $subject, $body, $header))): ?>
            <h2>送信が完了しました</h2>    
            <p class="message">お問い合わせありがとうございました。</p>
        <?php else: ?>
            <p>メールの送信が失敗しました</p>
        <?php endif; ?>
        <a href="index.html">HOMEへ</a>
    </div>

</body>
</html>