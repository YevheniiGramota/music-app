document.addEventListener('DOMContentLoaded', function () {
    const audioPlayer = document.getElementById('audioPlayer');
    const musicPlayer = document.getElementById('musicPlayer');
    const playPauseButton = document.getElementById('playPauseButton');
    const nextButton = document.getElementById('nextButton');
    const prevButton = document.getElementById('prevButton');
    const songTitleElement = document.getElementById('songTitle');
    const chartsList = document.querySelector('.charts-list');

    const songs = [
        { id: 'song0', name: 'Daylight', source: '/music-app/assets/music/pop/david_kushner_-_daylight_(z3.fm).mp3' },
        { id: 'song1', name: 'Bloody Mary', source: '/music-app/assets/music/pop/luchshie_pesni_shazam_2023_-_lady_gaga_-_bloody_mary_(z3.fm).mp3' },
        { id: 'song2', name: 'greedy', source: '../assets/music/pop/tate_mcrae_-_greedy_(z3.fm).mp3' },
        { id: 'song3', name: 'Lux Aterna', source: '/music-app/assets/music/metal/metallica_-_lux_terna_(z3.fm).mp3' },
        { id: 'song4', name: 'Du hast', source: '/music-app/assets/music/metal/rammstein_ramshtajn_-_du_hast_(z3.fm).mp3' },
        { id: 'song5', name: 'Feel Invincible', source: '../assets/music/metal/zarubezhnij_rok_-_skillet_-_feel_invincible_(z3.fm).mp3' },
        { id: 'song6', name: 'Last Christmas', source: '/music-app/assets/music/christmas/last_christmas_last_christmas_2015_-_carly_rae_jepsen_(z3.fm).mp3' },
        { id: 'song7', name: 'Last Christmas Wham', source: '/music-app/assets/music/christmas/last_crismas_-_last_cristmas_(z3.fm).mp3' },
        { id: 'song8', name: 'All I Want for Christmas Is You', source: '../assets/music/christmas/mariah_carey_-_all_i_want_for_cristmas_is_you_(z3.fm).mp3' },
        { id: 'song9', name: 'Everything Black (feat. Mike Taylor)', source: '/music-app/assets/music/train/everything_black_-_everything_black_(z3.fm).mp3' },
        { id: 'song10', name: 'Murder In My Mind', source: '/music-app/assets/music/train/kordhell_-_murder_in_my_mind_(z3.fm).mp3' },
        { id: 'song11', name: 'Move Your Body', source: '../assets/music/train/Ownboss, Sevek - Move Your Body.mp3' },
        { id: 'song12', name: 'In the End', source: '/music-app/assets/music/rock/linkin_park_-_linking_park_-_in_the_end_(z3.fm).mp3' },
        { id: 'song13', name: 'Smells Like Teen Spirit', source: '/music-app/assets/music/rock/nirvana_nirvana_-_smells_like_teen_spirit_(z3.fm).mp3' },
        { id: 'song14', name: 'Monster', source: '../assets/music/rock/zarubezhnij_rok_-_skillet_-_monster_(z3.fm).mp3' },
        { id: 'song15', name: 'Gods Plan', source: '/music-app/assets/music/rap/Drake Gods Plan.mp3' },
        { id: 'song16', name: 'Venom', source: '/music-app/assets/music/rap/eminem_-_venom_(z3.fm).mp3' },
        { id: 'song17', name: 'Mockingbird', source: '../assets/music/rap/hiti_2023_-_eminem_-_mockingbird_(z3.fm).mp3' },
    ];

    let currentSongIndex = -1;

    function showPlayer(event, songId) {
        event.stopPropagation();
        event.preventDefault();

        const index = songs.findIndex(song => song.id === songId);

        if (audioPlayer.src === songs[index].source) {
            audioPlayer.paused ? audioPlayer.play() : audioPlayer.pause();
        } else {
            audioPlayer.src = songs[index].source;
            audioPlayer.play();
            musicPlayer.style.display = 'block';
        }
        updateSongTitle(index);
    }

    function updateSongTitle(index) {
        songTitleElement.textContent = songs[index].name;
    }

    function playNextSong() {
        currentSongIndex = (currentSongIndex + 1) % songs.length;
        showPlayer(event, songs[currentSongIndex].id);
    }

    function playPreviousSong() {
        currentSongIndex = (currentSongIndex - 1 + songs.length) % songs.length;
        showPlayer(event, songs[currentSongIndex].id);
    }

    playPauseButton.addEventListener('click', function () {
        audioPlayer.paused ? audioPlayer.play() : audioPlayer.pause();
    });

    nextButton.addEventListener('click', playNextSong);
    prevButton.addEventListener('click', playPreviousSong);

    chartsList.addEventListener('click', function (event) {
        const target = event.target.closest('.charts-item');
        if (target) {
            const songId = target.id;
            const index = songs.findIndex(song => song.id === songId);
            if (index !== -1) {
                if (index === currentSongIndex) {
                    audioPlayer.paused ? audioPlayer.play() : audioPlayer.pause();
                } else {
                    showPlayer(event, songId);
                    currentSongIndex = index;
                }
            }
        }
    });

    audioPlayer.addEventListener('play', function () {
        audioPlayer.volume = 0.5;
    });
});
