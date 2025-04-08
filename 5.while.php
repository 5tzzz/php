<?php
$servername = "db4free.net";
$username = "immust";
$password = "immustimmust";
$dbname = "immust";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // 設定 PDO 錯誤模式為例外，方便錯誤處理
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT id, pwd FROM user");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>使用者列表 (PDO)</h1>";
    if ($results) {
        foreach ($results as $row) {
            echo "使用者 ID: " . htmlspecialchars($row["id"]) . ", 密碼: " . htmlspecialchars($row["pwd"]) . "<br>";
        }
    } else {
        echo "資料庫中沒有使用者資料。";
    }

} catch (PDOException $e) {
    echo "資料庫連線錯誤或查詢錯誤: " . $e->getMessage();
}

// PDO 連線會在腳本結束時自動關閉
?>
