<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["id"])) {
    echo "請先登入";
    echo "<meta http-equiv='REFRESH' content='3; url=2.login.html'>";
    exit();
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>新增佈告</title>
</head>
<body>
    <form method="post" action="23.bulletin_add.php">
        標　　題：<input type="text" name="title"><br><br>
        內　　容：<br>
        <textarea name="content" rows="10" cols="30"></textarea><br><br>
        佈告類型：
        <input type="radio" name="type" value="1">系上公告　
        <input type="radio" name="type" value="2">獲獎資訊　
        <input type="radio" name="type" value="3">徵才資訊<br><br>
        發布時間：<input type="date" name="time"><br><br>
        <input type="submit" value="新增佈告">
        <input type="reset" value="清除">
    </form>
</body>
</html>
