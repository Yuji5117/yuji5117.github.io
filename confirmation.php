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

$name = isset($_POST["name"]) ? $_POST["name"] : NULL;
$tel = isset($_POST["tel"]) ? $_POST["tel"] : NULL;
$mail = isset($_POST["mail"]) ? $_POST["mail"] : NULL;
$address = isset($_POST["address"]) ? $_POST["address"] : NULL;
$inquiry = isset($_POST["inquiry"]) ? $_POST["inquiry"] : NULL;


$name = spaceTrim($name);
$tel = spaceTrim($tel);
$mail = spaceTrim($mail);
$address = spaceTrim($address);
$inquiry = spaceTrim($inquiry);

// 名前判定 //
// if ($name == '') {
//     $errors['name'] = "名前が入力されていません。";
// }

// メール判定 //
// if ($mail == '') {
//     $errors['name'] = "メールが入力されていません。";
// }

// コメント判定 //
// if ($inquiry == '') {
//     $errors['inquiry'] = "その他記入欄が入力されていません。";
// }

// if(count($errors) === 0) {
$_SESSION["name"] = $name;
$_SESSION["tel"] = $tel;
$_SESSION["mail"] = $mail;
$_SESSION["address"] = $address;
$_SESSION["inquiry"] = $inquiry;
// }

?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/confirmation.css">
    <title>確認画面</title>
</head>
<body>
    <div class="confirmation">
        <h3>確認画面</h3>
        <p>以下の内容で間違いがなければ、「送信する」ボタンを押してください。</p>
    
        <form action="mail.php" method="post">
            <table>
                <tr>
                    <td class="label">お名前</td>
                    <td><?php echo escape($name); ?></td>
                </tr>
                <tr>
                    <td class="label">電話番号</td>
                    <td><?php echo escape($tel); ?></td>
                </tr>
                <tr>
                    <td class="label">メールアドレス</td>
                    <td><?php echo escape($mail); ?></td>
                </tr>
                <tr>
                    <td class="label">住所</td>
                    <td><?php echo escape($address); ?></td>
                </tr>
                <tr>
                    <td class="label">お問い合わせ内容</td>
                    <td><?php echo nl2br(escape($inquiry)); ?></td>
                </tr>
            </table>
            <input type="hidden" name="token" value= <?php echo escape($token); ?>>
            <div class="confirmation-btns">
                <input class="submit-btn" type="submit" value="送信する" />
                <input class="back-btn" type="button" value="戻る" onclick="history.back()">
            </div>
        </form>
    </div>
</body>
</html>