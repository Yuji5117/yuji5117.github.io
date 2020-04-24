<?php
session_start();

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

// トークン生成
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = sha1(random_bytes(30));
}

// HTML特殊文字をエスケープする関数
function escape($str) {
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/contact_form.css">
    <title>お問い合わせ | 株式会社エスビートレード
    </title>
</head>
<body>
    <section class="contact">
        <div class="contact-title">
            <h2>Contact us</h2>
        </div>
        <div class="contact-form-container">
            <form action="confirmation.php" method="post">
                <div class="form-items">
                    <div class="form-item">
                        <label for="" class="form-label">お名前</label>
                        <input type="text" name="name"　size="50" required>
                    </div>
                    <div class="form-item">
                        <label for="" class="form-label">電話番号</label>
                        <input type="tel" name="tel">
                    </div>
                    <div class="form-item">
                        <label for="" class="form-label" required>メールアドレス</label>
                        <input type="mail" name="mail" required>
                    </div>
                    <div class="form-item">
                        <label for="" class="form-label">住所</label>
                        <input type="text" name="address">
                    </div>
                    <div class="form-item">
                        <label for="" class="form-label">その他記入欄</label>
                        <textarea name="inquiry" id="" cols="30" rows="7" required></textarea>
                    </div>
                </div>
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
                <div class="send">
                    <button type="submit" class="send-btn">送信</button>
                    <button onclick="history.back()" class="back-btn">戻る</button>
                    
                </div>
            </form>
        </div>
    </section>

    
</body>
</html>