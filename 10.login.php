<?php
session_start(); // 開始或恢復 session
error_reporting(E_ALL); // 在開發階段開啟錯誤報告
ini_set('display_errors', 1);

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
            $_SESSION["id"] = $row["id"]; // 將使用者 ID 儲存到 session
            echo "登入成功！";
            echo "<script>setTimeout(function(){ window.location.href = '11.bulletin.php'; }, 3000);</script>";
            exit();
        } else {
            echo "帳號/密碼 錯誤！";
            echo "<script>setTimeout(function(){ window.location.href = '2.login.html'; }, 3000);</script>";
        }
    } else {
        echo "帳號/密碼 錯誤！
