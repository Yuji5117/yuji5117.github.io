<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Confirmation</title>
</head>
<body>
    <h2>問合せ内容</h2>

    <form action="mail.php" method="post">
        <table border="1">
            <tr>
                <td>名前</td>
                <td><?php echo $_POST["name"]; ?></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td><?php echo $_POST["tel"]; ?></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><?php echo $_POST["mail"]; ?></td>
            </tr>
            <tr>
                <td>住所</td>
                <td><?php echo $_POST["address"]; ?></td>
            </tr>
            <tr>
                <td>問い合わせ内容</td>
                <td><?php echo $_POST["inquiry"]; ?></td>
            </tr>
        </table>
    
    <input type="submit" value="送信" />
    </form>
</body>
</html>


<?php
session_start();
$_SESSION["name"] = $_POST["name"];
$_SESSION["tel"] = $_POST["tel"];
$_SESSION["mail"] = $_POST["mail"];
$_SESSION["address"] = $_POST["address"];
$_SESSION["inquiry"] = $_POST["inquiry"];

?>