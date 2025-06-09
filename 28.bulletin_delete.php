<?php
session_start();

// 檢查是否已登入
if (!isset($_SESSION["id"])) {
    echo "請登入帳號";
    echo "<meta http-equiv='refresh' content='3;url=2.login.html'>";
    exit;
}

// 資料庫連線
$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
if (!$conn) {
    die("資料庫連線失敗：" . mysqli_connect_error());
}

// 避免 SQLInjection
$bid = mysqli_real_escape_string($conn, $_GET['bid']);

// 刪除佈告
$sql = "DELETE FROM bulletin WHERE bid='$bid'";
if (mysqli_query($conn, $sql)) {
    echo "佈告刪除成功";
} else {
    echo "佈告刪除錯誤：" . mysqli_error($conn);
}

// 三秒後跳轉
echo "<meta http-equiv='refresh' content='3;url=11.bulletin.php'>";
?>
