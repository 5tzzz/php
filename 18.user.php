<html>
<head>
    <title>使用者管理</title>
</head>
<body>
<?php
error_reporting(0);
session_start();

// 檢查是否登入
if (!$_SESSION["id"]) {
    echo "請先登入帳號";
    echo "<meta http-equiv='refresh' content='3; url=2.login.html'>";
    exit();
}

// 如果有登入
echo "<h1>使用者管理</h1>";
echo "[<a href='14.user_add_form.php'>新增使用者</a>] ";
echo "[<a href='11.bulletin.php'>回佈告欄列表</a>]<br><br>";

echo "<table border='1' cellpadding='5'>
        <tr>
            <th>操作</th>
            <th>帳號</th>
            <th>密碼</th>
        </tr>";

// 連接資料庫
$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

// 抓資料
$result = mysqli_query($conn, "SELECT * FROM user");

// 全部列出來
while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $pwd = $row['pwd'];
    echo "<tr>
            <td>
                <a href='19.user_edit_form.php?id=$id'>修改</a> || 
                <a href='17.user_delete.php?id=$id'>刪除</a>
            </td>
            <td>$id</td>
            <td>$pwd</td>
        </tr>";
}

echo "</table>";
?>
</body>
</html>
