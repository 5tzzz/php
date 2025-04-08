<?php
session_start(); // 開始或恢復 session

// 移除 session 中儲存使用者 ID 的變數
unset($_SESSION["id"]);

// 銷毀所有 session 資料，更徹底地清除 session
session_destroy();

echo "您已成功登出！";
echo "<script>setTimeout(function(){ window.location.href = '2.login.html'; }, 3000);</script>";
?>
