<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style5.css">
    <title>SPACEWAVE</title>
</head>
<body>
    <header class="header header--fixed" id="header">
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
    <section class="section" style="background: #fff;">
        <div class="container">
            <div class="section__header">
                <h3 class="section__suptitle">Поп</h3>
                <div class="search-box">
                    <input type="text" id="searchInput" class="search-input" onkeyup="searchSongs()"  placeholder="Пошук...">
                </div>
            </div>
        </div>
            <ol class="charts-list">
                <li id="song0" class="charts-item" onclick="showPlayer(event, 'song0')">
                    <div class="image-container">
                        <img src="../assets/img/pop/daylight.jpg" alt="Daylight" style="max-width: 100px; max-height: 100px; cursor: pointer;">
                    </div>
                    <a href="#" style="text-decoration: none; color: black;">Daylight</a>
                    <span>David Kushner</span>
                </li>
                <li id="song1" class="charts-item" onclick="showPlayer(event, 'song1')">
                    <div class="image-container">
                        <img src="../assets/img/pop/bloodymary.jpg" alt="Bloody Mary" style="max-width: 100px; max-height: 100px; cursor: pointer;">
                    </div>
                    <a href="#" style="text-decoration: none; color: black;">Bloody Mary</a>
                    <span>Lady Gaga</span>
                </li>
                <li id="song2" class="charts-item" onclick="showPlayer(event, 'song2')">
                    <div class="image-container">
                        <img src="../assets/img/pop/greedy.jpg" alt="greedy" style="max-width: 100px; max-height: 100px; cursor: pointer;">
                    </div>
                    <a href="#" style="text-decoration: none; color: black;">greedy</a>
                    <span>Tate McRae</span>
                </li>
            </ol>
    
            <div class="music-player" id="musicPlayer">
                <p id="songTitle"></p>
                <audio id="audioPlayer" controls></audio>
                <div class="music-player-controls">
                    <button id="prevButton" onclick="prevSong()">Previous</button>
                    <button id="playPauseButton" onclick="togglePlayPause()">Play/Pause</button>
                    <button id="nextButton" onclick="nextSong()">Next</button>
                </div>
            </div>
        </div>
    </section>
    <script src="search.js"></script>
    <script src="main.js"></script>
</body>
</html>