<html>
<head>
    <meta charset="UTF-8">
    <title>修改使用者</title>
</head>
<body>
<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["id"])) {
    echo "請登入帳號";
    echo "<meta http-equiv='REFRESH' content='3; url=2.login.html'>";
} else {
    // 建立資料庫連線
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 取得 id 避免 SQLInjection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // 查詢使用者資料
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    // 如有資料
    if ($row) {
        echo "
        <form method='post' action='20.user_edit.php'>
            <input type='hidden' name='id' value='{$row['id']}'>
            帳號：{$row['id']}<br> 
            新密碼：<input type='password' name='pwd'><p></p>
            <input type='submit' value='修改'>
        </form>
        ";
    } else {
        echo "找不到使用者";
    }

    mysqli_close($conn);
}
?>
</body>
</html>
