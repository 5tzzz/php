<?php
session_start(); // 開始或恢復 session

$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
if (!$conn) {
    die("資料庫連線失敗: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 查詢資料庫中是否存在該使用者
    $sql = "SELECT id, pwd FROM user WHERE id = '$username'"; // 注意：這裡直接將使用者輸入放入 SQL 查詢是很不安全的！
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // **重要安全提示：** 不要直接比較明文密碼！
        // 在實際應用中，應該將使用者輸入的密碼進行雜湊處理，
        // 然後與資料庫中儲存的雜湊密碼進行比對。
        if ($password == $row["pwd"]) {
            echo "登入成功！";
            $_SESSION["user_id"] = $row["id"]; // 將使用者 ID 儲存到 session
            // 可以導向到登入後的頁面：
            // header("Location: dashboard.php");
            exit();
        } else {
            echo "密碼錯誤！";
        }
    } else {
        echo "使用者名稱不存在！";
    }
} else {
    echo "請輸入使用者名稱和密碼。";
}

mysqli_close($conn);
?>
