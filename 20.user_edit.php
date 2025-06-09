<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["id"])) {
    echo "請登入帳號";
    echo "<meta http-equiv='REFRESH' content='3; url=2.login.html'>";
    exit();
}

// 確認表單資料有傳來
if (!isset($_POST['id']) || !isset($_POST['pwd']) || $_POST['pwd'] == "") {
    echo "請輸入密碼";
    echo "<meta http-equiv='REFRESH' content='3; url=18.user.php'>";
    exit();
}

// 連線資料庫
$conn = mysqli_connect("db4free.net",_
