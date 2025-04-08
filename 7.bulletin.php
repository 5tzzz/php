<?php
// 關閉錯誤報告 (原始程式碼已關閉，但建議在開發階段開啟)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// 資料庫連線資訊
$servername = "db4free.net";
$username = "immust";
$password = "immustimmust";
$dbname = "immust";

// 建立資料庫連結
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 檢查連線是否成功
if (!$conn) {
    die("資料庫連線失敗: " . mysqli_connect_error());
}

// 設定資料庫字元編碼為 UTF-8，避免中文亂碼問題
mysqli_set_charset($conn, "utf8");

// SQL 查詢語句
$sql = "SELECT bid, type, title, content, time FROM bulletin"; // 明確指定要查詢的欄位

// 執行 SQL 查詢
$result = mysqli_query($conn, $sql);

// 檢查查詢是否成功
if ($result) {
    // 檢查是否有資料
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='2'>";
        echo "<tr><th>佈告編號</th><th>佈告類別</th><th>標題</th><th>佈告內容</th><th>發佈時間</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) { // 使用 mysqli_fetch_assoc 取得關聯陣列
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["bid"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["type"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
            echo "<td>" . nl2br(htmlspecialchars($row["content"])) . "</td>"; // 處理換行符號
            echo "<td>" . htmlspecialchars($row["time"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "沒有佈告資料。";
    }

    // 釋放結果集記憶體
    mysqli_free_result($result);
} else {
    echo "查詢資料失敗: " . mysqli_error($conn);
}

// 關閉資料庫連線
mysqli_close($conn);
?>
