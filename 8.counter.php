<?php
session_start(); // 開始或恢復 session

// 定義 session 中用於儲存計數器的鍵名
$counterKey = "visitCounter";

// 檢查 session 中是否已存在計數器
if (!isset($_SESSION[$counterKey])) {
    // 如果不存在，則初始化計數器為 1
    $_SESSION[$counterKey] = 1;
} else {
    // 如果存在，則將計數器加 1
    $_SESSION[$counterKey]++;
}

// 顯示計數器的值
echo "您已瀏覽此頁面 " . $_SESSION[$counterKey] . " 次。";
echo "<br><a href='9.reset_counter.php'>重置計數器</a>";
?>
