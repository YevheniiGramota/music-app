<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SPACEWAVE</title>
</head>
<body>
    <header class="header header--fixed" id="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo"><a class="gf" href="index.php">SPACEWAVE</a></div>
                <nav class="nav">
                    <a class="nav__link" href="news.php">Новини</a>
                    <a class="nav__link" href="idex/charts.php">Чарти</a>
                    <a class="nav__link" href="idex/musicsp.php">Знайти музику</a>
                    <?php
                 session_start();
                  if (isset($_SESSION['login_user']) ){
                echo '<a class="nav__link" href="idex/logout.php">Вийти</a>';
                  } else {
                echo '<a class="nav__link" href="idex/login.php">Увійти</a>';
                 }
                ?>
                </nav>
            </div>
        </div>
    </header>
    <div class="intro" id="intro">
        <div class="container">
            <div class="intro__inner">
                <h2 class="intro__suptitle">SPACEWAVE</h2>
                <h1 class="intro__title">Пориньте в музику разом з нами</h1>
                <div class="new-social-icons">
                    <a href="https://www.instagram.com" target="_blank">
                        <img src="assets/img/about/instagram.svg" alt="Instagram Icon" width="40" height="40">
                    </a>
                    <a href="https://web.telegram.org" target="_blank">
                        <img src="assets/img/about/telegram.svg" alt="Telegram Icon" width="40" height="40">
                    </a>
                    <a href="https://www.facebook.com/" target="_blank">
                        <img src="assets/img/about/facebook.svg" alt="Facebook Icon" width="40" height="40">
                    </a>
                </div>
                <a class="btn" href="index.html"><img src="" alt=""></a>
            </div>
        </div>
        <div class="slider">
            <div class="container">
                
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
