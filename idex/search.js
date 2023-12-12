// Function to show/hide the music player
function showPlayer(event, songId) {
    // Your existing code for showing the music player
}

// Function to handle the search functionality
function searchSongs() {
    // Get input value and convert it to lowercase for case-insensitive search
    var input = document.getElementById('searchInput').value.toLowerCase();
    
    // Get the list of songs
    var songs = document.getElementsByClassName('charts-item');
    
    // Loop through each song
    for (var i = 0; i < songs.length; i++) {
        var song = songs[i];
        var title = song.querySelector('a').innerText.toLowerCase();
        var author = song.querySelector('span').innerText.toLowerCase();
        
        // Check if the input matches the title or author
        if (title.indexOf(input) > -1 || author.indexOf(input) > -1) {
            song.style.display = "";  // Show the song if it matches
        } else {
            song.style.display = "none";  // Hide the song if it doesn't match
        }
    }
}

// Function to toggle play/pause for the audio player
function togglePlayPause() {
    // Your existing code for toggling play/pause
}

// Function to play the previous song
function prevSong() {
    // Your existing code for playing the previous song
}

// Function to play the next song
function nextSong() {
    // Your existing code for playing the next song
}

// Call searchSongs() when the page loads
document.addEventListener('DOMContentLoaded', function() {
    searchSongs();
});