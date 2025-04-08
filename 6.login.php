<?php
session_start(); // 開始或恢復 session

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

if (isset($_POST["id"]) && isset($_POST["pwd"])) {
    $input_id = $_POST["id"];
    $input_pwd = $_POST["pwd"];

    // 使用預備語句防止 SQL 注入
    $stmt = mysqli_prepare($conn, "SELECT id, password_hash FROM user WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "s", $input_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // **重要：驗證密碼雜湊**
        if (password_verify($input_pwd, $row["password_hash"])) {
            echo "登入成功！";
            $_SESSION["user_id"] = $row["id"]; // 將使用者 ID 儲存到 session
            // 可以導向到登入後的頁面：
            // header("Location: dashboard.php");
            exit();
        } else {
            echo "帳號/密碼 錯誤";
        }
    } else {
        echo "帳號/密碼 錯誤";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "請輸入帳號和密碼。";
}

mysqli_close($conn);
?>
