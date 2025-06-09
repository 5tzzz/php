<?php
session_start();

// 未登入
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

// 避免 SQL Injection
$title = mysqli_real_escape_string($conn, $_POST['title']);
$content = mysqli_real_escape_string($conn, $_POST['content']);
$time = mysqli_real_escape_string($conn, $_POST['time']);
$type = (int)$_POST['type'];
$bid = mysqli_real_escape_string($conn, $_POST['bid']);

// 執行更新
$sql = "UPDATE bulletin SET title='$title', content='$content', time='$time', type=$type WHERE bid='$bid'";
if (mysqli_query($conn, $sql)) {
    echo "修改成功，三秒鐘後回到佈告欄列表";
} else {
    echo "修改錯誤：" . mysqli_error($conn);
}

echo "<meta http-equiv='refresh' content='3;url=11.bulletin.php'>";
?>
