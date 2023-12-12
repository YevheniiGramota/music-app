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
    
    <div class="container">
        <div class="section__header">
            <h3 class="section__suptitle">Новини</h3>
        </div>
    <div class="section-divider"></div>
    <section class="white-bg">
        <div class="custom-container">
            <h2 class="main-title">ГРАЄ БІЛЯ МОРЯ НА СВІТАНКУ</h2>
            <div class="separator"></div>
            <h1 class="section-title"></h1>
            <p class="news-topic"></p>
            <p class="news-text">Два місяці на світанках та в обід на пляжі "Ланжерон" в Одесі грав на фортепіано Ігор Янчук. Проєкт музикант назвав "Піаноморе".</p>
            <p class="news-author">Музика | 4 грудня, 2023</p>
        </div>
        <div class="photo-container">
            <a href="https://suspilne.media/631864-grae-bila-mora-na-svitanku-pianist-z-kieva-dav-koncert-na-odeskomu-lanzeroni/" target="_blank">
                <img src="../music-app/assets/img/news/1.jpg" alt="">
            </a>
        </div>
    </section>
    <div class="section-divider"></div>
    <section class="white-bg">
        <div class="photo-container">
            <a href="https://suspilne.media/624895-u-zitomiri-na-sceni-filarmonii-akademicnij-hor-z-cernivciv-prezentuvav-novu-programu-z-disneivskimi-saundtrekami/" target="_blank">
                <img src="../music-app/assets/img/news/2.jpg" alt="">
            </a>
        </div>
        <div class="custom-container">
            <h2 class="main-title">Нову програму Чернівецького хору</h2>
            <div class="separator"></div>
            <h1 class="section-title"></h1>
            <p class="news-topic"></p>
            <p class="news-text">... презентував нову програму із 19 саундтреків з мультфільмів та художніх стрічок компанії "Дісней". Житомир став першим містом, де хор презентував цю програму.</p>
            <p class="news-author">Музика | 24 грудня, 2023</p>
        </div>
    </section>


    <div class="section-divider"></div>
    <section class="white-bg">


        <div class="custom-container">
            <h2 class="main-title">Хор з Чернівців</h2>
            <div class="separator"></div>
            <h1 class="section-title"></h1>
            <p class="news-topic"></p>
            <p class="news-text"> Житомир стане першим містом, де академічний камерний хор "Чернівці" презентує нову програму "Дісней до України з казкою"...</p>
            <p class="news-author">Музика | 22 грудня, 2023</p>
        </div>
        <div class="photo-container">
            <a href="https://suspilne.media/622981-zitomir-stane-persim-mistom-de-akademicnij-hor-z-cernivciv-prezentue-novu-programu/" target="_blank">
                <img src="../music-app/assets/img/news/3.jpg" alt="">
            </a>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
