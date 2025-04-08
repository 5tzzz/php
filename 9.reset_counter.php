<?php
session_start(); // 開始或恢復 session

// 定義 session 中計數器的鍵名 (與 8.counter.php 保持一致)
$counterKey = "visitCounter";

// 移除 session 中指定的計數器變數
if (isset($_SESSION[$counterKey])) {
    unset($_SESSION[$counterKey]);
    $message = "計數器已成功重置。";
} else {
    $message = "計數器尚未存在，無需重置。";
}

echo $message;
echo "<br><a href='8.counter.php'>返回計數器頁面</a>";

// 使用 JavaScript 進行頁面重定向，提供更好的使用者體驗
echo "<script>setTimeout(function(){ window.location.href = '8.counter.php'; }, 2000);</script>";
?>
