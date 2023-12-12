<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <title>SPACEWAVE</title>
</head>
<body>
    <header class="header header--fixed" id="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo"><a class="gf" href="../index.php">SPACEWAVE</a></div>
                <div class="search-box">
                    <input type="text" id="searchInput" class="search-input" onkeyup="searchSongs()"  placeholder="Пошук...">
                </div>
                <nav class="nav">
                    <a class="nav__link" href="../news.php">Новини</a>
                    <a class="nav__link" href="charts.php">Чарти</a>
                    <a class="nav__link" href="musicsp.php">Знайти музику</a>
                    <?php
                 session_start();
                  if (isset($_SESSION['login_user']) ){
                echo '<a class="nav__link" href="logout.php">Вийти</a>';
                  } else {
                echo '<a class="nav__link" href="login.php">Увійти</a>';
                 }
                ?>
                </nav>
            </div>
        </div>
    </header>
    <section class="section" style="background: #fff;">
        <div class="container">
            <div class="section__header">
                <div class="header-left">
                    <h3 class="section__suptitle">Усі канали</h3>
                </div>
                <h4 class="category-title">Категорії</h4>

            </div>

            <div style="text-align: center; margin-top: 20px;">
                <a href="main.php" class="navigation-button button-1">Чарти</a>
                <a href="сhristmas.php" class="navigation-button button-2">Різдво</a>
                <a href="train.php" class="navigation-button button-3">Тренування</a>
            </div>
            
            <div class="section__header">
            <h4 class="category-title">Жанри</h4>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <a href="rock.php" class="navigation-button button-4">Рок</a>
                <a href="metal.php" class="navigation-button button-5">Метал</a>
                <a href="pop.php" class="navigation-button button-6">Поп</a>
                <br>
                <script src="language.js"></script>
                <script src="theme.js"></script>
            </div>
        </div>
    </section>
</body>
</html>
