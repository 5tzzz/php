<?php
// 假設你已經設定好資料庫連線資訊
$servername = "localhost";
$username = "your_db_user";
$password = "your_db_password";
$dbname = "your_db_name";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // 設定 PDO 錯誤模式為例外
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["id"]) && isset($_POST["pwd"])) {
        $username = $_POST["id"];
        $password = $_POST["pwd"];

        // 查詢資料庫中是否存在該使用者
        $stmt = $conn->prepare("SELECT id, username, password_hash FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password_hash"])) {
            echo "登入成功";
            // 在這裡可以開始建立 session，記錄使用者已登入
            session_start();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            // 可以導向到登入後的頁面
            // header("Location: dashboard.php");
            exit();
        } else {
            echo "登入失敗";
        }
    } else {
        echo "請輸入使用者名稱和密碼";
    }

} catch(PDOException $e) {
    echo "資料庫連線錯誤: " . $e->getMessage();
}
$conn = null;
?>
