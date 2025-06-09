<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="utf-8">
  <title>明新科技大學資訊管理系</title>
  <link rel="stylesheet" href="https://cdn.bootcss.com/flexslider/2.6.3/flexslider.min.css">
  <script src="https://cdn.bootcss.com/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/flexslider/2.6.3/jquery.flexslider-min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-align: center;
      color: #333;
    }
    body {
      font-family: 微軟正黑體, sans-serif;
    }
    .top, .nav, .banner, .faculty, .contact, .footer {
      padding: 20px;
    }
    .top {
      background: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .top .logo img {
      width: 80px;
      vertical-align: middle;
    }
    .top .nav-link a {
      margin: 0 10px;
      text-decoration: none;
      color: #333;
    }

    .nav {
      background: #333;
    }
    .nav a {
      color: white;
      padding: 14px 20px;
      display: inline-block;
      text-decoration: none;
    }
    .nav a:hover {
      background: #111;
    }

    .flexslider img {
      width: 100%;
    }

    .banner {
      background: linear-gradient(#ABDCFF, #0396FF);
      color: white;
    }

    .faculty .container {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }
    .faculty img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
    }

    .contact {
      background: #f4f4f4;
    }
    .contact .info {
      margin: 10px 0;
    }

    .footer {
      background: #222;
      color: white;
      font-size: 14px;
    }

    /* Login Modal */
    .modal {
      display: none;
      position: fixed;
      top: 30%;
      left: 40%;
      width: 300px;
      padding: 20px;
      background: white;
      border: 1px solid #ccc;
      z-index: 1000;
    }
    .modal input {
      margin: 5px 0;
      padding: 5px;
      width: 90%;
    }
  </style>
  <script>
    $(window).on("load", function () {
      $('.flexslider').flexslider({ animation: "slide" });
    });
  </script>
</head>
<body>

  <div class="top">
    <div class="logo">
      <img src="https://github.com/shhuangmust/html/raw/111-1/IMMUST_LOGO.JPG" alt="logo"> 明新資管系
    </div>
    <div class="nav-link">
      <a href="#">明新科大</a>
      <a href="#">管理學院</a>
      <a href="#" onclick="document.getElementById('login').style.display='block'">登入</a>
    </div>
  </div>

  <div class="nav">
    <a href="#home">首頁</a>
    <a href="#introduction">系所簡介</a>
    <a href="#faculty">成員簡介</a>
    <a href="#about">相關資訊</a>
  </div>

  <div class="flexslider">
    <ul class="slides">
      <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider1.JPG" /></li>
      <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider2.JPG" /></li>
      <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider3.JPG" /></li>
    </ul>
  </div>

  <div class="banner" id="introduction">
    <h2>系所簡介</h2>
    <p>歷年教育部評鑑皆榮獲一等，全國私立科大第一資管系</p>
  </div>

  <div class="faculty" id="faculty">
    <h2>師資介紹</h2>
    <div class="container">
      <div><img src="https://github.com/shhuangmust/html/raw/111-1/faculty1.jpg"><p>黃老師</p></div>
      <div><img src="https://github.com/shhuangmust/html/raw/111-1/faculty2.jpg"><p>李老師</p></div>
      <div><img src="https://github.com/shhuangmust/html/raw/111-1/faculty3.jpg"><p>應老師</p></div>
    </div>
  </div>

  <div class="contact" id="about">
    <h2>聯絡資訊</h2>
    <div class="info">明新科技大學管理學院大樓二樓</div>
    <div class="info">304新竹縣新豐鄉新興路1號</div>
    <div class="info">電話：03-5593142 分機：3431~3433</div>
    <div class="info">傳真：03-5593142 分機：3440</div>
    <iframe width="300" height="200" src="https://www.google.com/maps/embed?pb=!1m18!..." style="border:0;" allowfullscreen></iframe>
  </div>

  <div class="footer">
    &copy; 2022 明新科技大學資訊管理系. 維護者 Tony SHHuang
  </div>

  <div id="login" class="modal">
    <div>
      <b onclick="document.getElementById('login').style.display='none'" style="float:right;cursor:pointer;">×</b>
      <form method="post" action="10.login.php">
        <div>帳號：<input type="text" name="id"></div>
        <div>密碼：<input type="password" name="pwd"></div>
        <input type="submit" value="登入">
        <input type="reset" value="清除">
      </form>
    </div>
  </div>

</body>
</html>
