<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["id"])) {
    echo "請先登入";
    echo "<meta http-equiv='REFRESH' content='3; url=2.login.html'>";
    exit();
}

// 連接資料庫
$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

// 確保資料不為空
if ($_POST['title'] == "" || $_POST['content'] == "" || $_POST['time'] == "") {
    echo "請填寫完整資料";
    echo "<meta http-equiv='REFRESH' content='3; url=22.bulletin_form.php'>";
    exit();
}

// 避免 SQL 注入
$title = mysqli_real_escape_string($conn, $_POST['title']);
$content = mysqli_real_escape_string($conn, $_POST['content']);
$type = intval($_POST['type']);  // 確保是數字
$time = mysqli_real_escape_string($conn, $_POST['time']);

// 新增資料
$sql = "INSERT INTO bulletin (title, content, type, time) 
        VALUES ('$title', '$content', $type, '$time')";

if (!mysqli_query($conn, $sql)) {
    echo "新增失敗";
} else {
    echo "新增佈告成功，三秒後回首頁";
    echo "<meta http-equiv='REFRESH' content='3; url=11.bulletin.php'>";
}

mysqli_close($conn);
?>
