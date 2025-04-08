     <?php 
    // 確保提交的表單中有 "id" 和 "pwd" 參數
    if (isset($_POST["id"]) && isset($_POST["pwd"])) {
        echo "用戶名: " . $_POST["id"];
        echo "<br>";
        echo "密碼: " . $_POST["pwd"];
    } else {
        echo "表單數據未正確提交";
    }
?><!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>表單提交範例</title>
</head>
<body>
    <h2>登入表單</h2>
    <form method="POST" action="your_script.php">
        <label for="id">用戶名：</label>
        <input type="text" name="id" id="id" required>
        <br><br>
        <label for="pwd">密碼：</label>
        <input type="password" name="pwd" id="pwd" required>
        <br><br>
        <button type="submit">提交</button>
    </form>
</body>
</html>
