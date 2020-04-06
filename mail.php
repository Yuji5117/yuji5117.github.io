<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
 
<body>
 
<h2>メール送信完了</h2>    
 
<p class="message">
お問い合わせありがとうございます。1営業日以内にご返信させていただきます。<br>
自動返信メールをお送りしておりますのでご確認ください。<br>
1時間たっても届かない場合はお手数ですがこちらからご連絡ください。
</p>
</body>
    
</html>


<?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    session_start();

    $to = "yuji6523ny@gmail.com";

    $subject = "問合せ";

    $name = htmlspecialchars($_SESSION['name']); 
    $tel = htmlspecialchars($_SESSION['tel']);
    $mail = htmlspecialchars($_SESSION['mail']);
    $address = htmlspecialchars($_SESSION['address']);
    $inquiry = htmlspecialchars($_SESSION['inquiry']);

    
    $body = "名前: $name\n".
    "メール: $mail\n".
    "電話番号: $tel\n".
    "住所: $address\n".
    "内容: $inquiry";


    $header = "From:$mail";

    ?>

<?php if((mb_send_mail($to, $subject, $body, $header))): ?>
    <p>メールの送信が完了しました</p>
<?php else: ?>
    <p>メールの送信が失敗しました</p>
<?php endif ; ?>
<a href="index.html">戻る</a>