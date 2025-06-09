<?php
// 開啟 session 並檢查是否登入
error_reporting(0);
session_start();

if (!$_SESSION["id"]) {
    echo "請先登入帳號";
    echo "<meta http-equiv='refresh' content='3;url=2.login.html'>";
    exit();
}

// 連接 MySQL 資料庫
$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

// 建立 SQL 新增語法
$id = $_POST['id'];
$pwd = $_POST['pwd'];
$sql = "INSERT INTO user(id, pwd) VALUES('$id', '$pwd')";

// 執行 SQL
if (!mysqli_query($conn, $sql)) {
    echo "新增使用者失敗";
} else {
    echo "新增使用者成功，三秒後回到使用者頁面";
    echo "<meta http-equiv='refresh' content='3;url=18.user.php'>";
}
?>
