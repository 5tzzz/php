<?php
session_start();
error_reporting(E_ALL); // 在開發階段開啟錯誤報告
ini_set('display_errors', 1);

// 檢查使用者是否已登入
if (!isset($_SESSION["id"])) {
    echo "請先登入！";
    echo "<script>setTimeout(function(){ window.location.href = '2.login.html'; }, 3000);</script>";
    exit();
}

// 資料庫連線資訊
$servername = "db4free.net";
$username = "immust";
$password = "immustimmust";
$dbname = "immust";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("資料庫連線失敗: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

echo "歡迎, " . htmlspecialchars($_SESSION["id"]) .
    "[<a href='12.logout.php'>登出</a>] " .
    "[<a href='18.user.php'>管理使用者</a>] " .
    "[<a href='22.bulletin_add_form.php'>新增佈告</a>]<br>";

$sql = "SELECT bid, type, title, content, time FROM bulletin ORDER BY time DESC"; // 建議按時間排序
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='2'>";
        echo "<tr><th>操作</th><th>佈告編號</th><th>佈告類別</th><th>標題</th><th>佈告內容</th><th>發佈時間</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>";
            echo "<a href='26.bulletin_edit_form.php?bid=" . htmlspecialchars($row["bid"]) . "'>修改</a>&nbsp;";
            echo "<a href='28.bulletin_delete.php?bid=" . htmlspecialchars($row["bid"]) . "' onclick=\"return confirm('確定要刪除這篇佈告嗎？')\">刪除</a>";
            echo "</td>";
            echo "<td>" . htmlspecialchars($row["bid"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["type"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
            echo "<td>" . nl2br(htmlspecialchars($row["content"])) . "</td>"; //
