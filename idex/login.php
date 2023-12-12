<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style3.css">
  <title>SPACEWAVE</title>
  </head>
  <body>
    <header class ="header header--fixed" id="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo"><a class="gf" href="../index.php">SPACEWAVE</a></div>
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
    <center>
        <div class="center-container">
            <div class="intro__inner">
    
                <form action="log.php" method="post">
                    <label for="log">Login:</label><br>
                    <input type="text" id="log" name="log" required><br>
    
                    <label for="pass">Password:</label><br>
                    <input type="password" id="pass" name="pass" required><br>
                    
                    <input class="btn" type="submit" value="Enter">
                    <a class="item" href="reg.php">Register</a>
                </form>
                <div class="social-icons">
                    <a href="https://www.instagram.com" target="_blank">
                        <img src="../assets/img/about/instagram.svg" alt="Instagram Icon" width="20" height="20">
                    </a>
                    <a href="https://web.telegram.org" target="_blank">
                        <img src="../assets/img/about/telegram.svg" alt="Telegram Icon" width="20" height="20">
                    </a>
                    <a href="https://www.facebook.com/" target="_blank">
                        <img src="../assets/img/about/facebook.svg" alt="Facebook Icon" width="20" height="20">
                    </a>
                </div>
            </div>
        </div>
    </center>

</body>
</html>
