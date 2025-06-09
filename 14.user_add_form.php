<html>
    <head><title>新增使用者</title></head>
    <body>
<?php 
    //檢查是否登入       
    error_reporting(0);//關閉錯誤訊息
    session_start();//開啟session功能
    if (!$_SESSION["id"]) //未登入情況下
    {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";//3秒後跳轉"2.login.html"登入畫面
    }
    else{    //已登入
        //將資料送到15.user_add.php新增帳密
        echo "
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br>
                密碼：<input type=text name=pwd><p></p>
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>
