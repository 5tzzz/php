<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["id"])) {
    echo "請先登入";
    echo "<meta http-equiv='REFRESH' content='3; url=2.login.html'>";
    exit();
}

$conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

// 安全處理 GET 參數
$bid = intval($_GET["bid"]);

// 查詢該筆佈告
$result = mysqli_query($conn, "SELECT * FROM bulletin WHERE bid=$bid");
$row = mysqli_fetch_array($result);

// 設定 radio 按鈕預選
$checked1 = $row['type'] == 1 ? "checked" : "";
$checked2 = $row['type'] == 2 ? "checked" : "";
$checked3 = $row['type'] == 3 ? "checked" : "";

// HTML 輸出
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改佈告</title>
</head>
<body>
    <form method="post" action="27.bulletin_edit.php">
        佈告編號：<?php echo $row['bid']; ?>
        <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>"><br><br>

        標　　題：<input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>"><br><br>

        內　　容：<br>
        <textarea name="content" rows="10" cols="30"><?php echo htmlspecialchars($row['content']); ?></textarea><br><br>

        佈告類型：
        <input type="radio" name="type" value="1" <?php echo $checked1; ?>>系上公告　
        <input type="radio" name="type" value="2" <?php echo $checked2; ?>>獲獎資訊　
        <input type="radio" name="type" value="3" <?php echo $checked3; ?>>徵才資訊<br><br>

        發布時間：<input type="date" name="time" value="<?php echo $row['time']; ?>"><br><br>

        <input type="submit" value="修改佈告">　
        <input type="reset" value="清除">
    </form>
</body>
</html>
