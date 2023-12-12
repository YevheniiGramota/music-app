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
                echo '<a class="nav__link" href="idex/logout.php">Вийти</a>';
                  } else {
                echo '<a class="nav__link" href="idex/login.php">Увійти</a>';
                 }
                ?>
                </nav>
            </div>
        </div>
    </header>
    <section class="section" style="background: #fff;">
        <div class="container">
            <div class="section__header">
                <h3 class="section__suptitle">Різдво</h3>
                <div class="search-box">
                    <input type="text" id="searchInput" class="search-input" onkeyup="searchSongs()"  placeholder="Пошук...">
                </div>
            </div>
        </div>
            <ol class="charts-list">
                <li id="song6" class="charts-item" onclick="showPlayer(event, 'song6')">
                    <div class="image-container">
                        <img src="../assets/img/christmas/Last Christmas.jpg" alt="Last Christmas" style="max-width: 100px; max-height: 100px; cursor: pointer;">
                    </div>
                    <a href="#" style="text-decoration: none; color: black;">Last Christmas</a>
                    <span>Carly Rae Jepsen</span>
                </li>
                <li id="song7" class="charts-item" onclick="showPlayer(event, 'song7')">
                    <div class="image-container">
                        <img src="../assets/img/christmas/Last Christmaswham.jpg" alt="Last Christmas Wham" style="max-width: 100px; max-height: 100px; cursor: pointer;">
                    </div>
                    <a href="#" style="text-decoration: none; color: black;">Last Christmas</a>
                    <span>Wham!</span>
                </li>
                <li id="song8" class="charts-item" onclick="showPlayer(event, 'song8')">
                    <div class="image-container">
                        <img src="../assets/img/christmas/All I Want for Christmas Is You.jpg" alt="All I Want for Christmas Is You" style="max-width: 100px; max-height: 100px; cursor: pointer;">
                    </div>
                    <a href="#" style="text-decoration: none; color: black;">All I Want for Christmas Is You</a>
                    <span>Mariah Carey</span>
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