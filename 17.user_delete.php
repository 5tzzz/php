<?php
error_reporting(0);
session_start();

// 檢查是否登入
if (!$_SESSION["id"]) {
    echo "請先登入帳號";
    echo "<meta http-equiv='refresh' content='3; url=2.login.html'>";
    exit();
}

// 連接資料庫
$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

// 刪除使用者
$id = $_GET["id"];
$sql = "DELETE FROM user WHERE id='$id'";

if (!mysqli_query($conn, $sql)) {
    echo "刪除失敗";
} else {
    echo "使用者刪除成功";
}

// 三秒後跳轉
echo "<meta http-equiv='refresh' content='3; url=18.user.php'>";
?>
