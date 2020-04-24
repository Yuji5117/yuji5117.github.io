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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/mail.css">
    <title>送信完了</title>
</head>

<body>
    <?php
    mb_language("japanese");
    mb_internal_encoding("UTF-8");
    
    $to = "info@sb-trade.co.jp";
    
    
    $name = $_SESSION['name']; 
    $tel = $_SESSION['tel']; 
    $from = $_SESSION['mail']; 
    $mail = $_SESSION['mail']; 
    $address = $_SESSION['address']; 
    $inquiry = $_SESSION['inquiry']; 
    
    $subject = "$name 様からのお問い合わせ";
    
    $body = "以下の内容でお問い合わせがありました。\n\n".
    "名前：$name\n".
    "住所：$address\n".
    "電話番号：$tel\n".
    "メールアドレス：$mail\n\n".
    "＜お問い合わせ内容＞\n".
    "$inquiry";
    
    
    $header = "From: $from";
        
    ?>

    <div class="mail">
        <?php if((mb_send_mail($to, $subject, $body, $header))): ?>
            <h2>お問い合わせが送信されました</h2>    
            <div class="message-box">
                <p class="message">この度はお問い合わせをいただきましてありがとうございます。<br><br>
                    内容を確認させていただきまして担当者よりご連絡させていただきます。<br>
                    数日経過しても折り返しのご連絡がない場合は<br>
                    送信エラーの可能性がございますのでお手数ですが<br>
                    再度お問い合わせいただくか、お電話にてご連絡を頂けましたら幸いです。
                </p>
            </div>
        <?php else: ?>
            <p>メールの送信が失敗しました</p>
        <?php endif; ?>
        <a href="index.html">HOMEへ</a>
    </div>

</body>
</html>