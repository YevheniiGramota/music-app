// Отримуємо посилання на аудіоелемент та його джерело
const audioPlayer = document.getElementById('audioPlayer');
const songTitle = document.getElementById('songTitle');

// Функція для відтворення пісні
function playSong(source, title) {
    audioPlayer.src = source;
    audioPlayer.load(); // Перезавантажуємо аудіоплеєр, щоб зміни вступили в силу
    audioPlayer.play(); // Відтворюємо пісню
    if (title) {
        songTitle.innerText = title; // Оновлюємо назву пісні, якщо передано title
    }
}

// Обробник події для натискання на елемент списку
function showPlayer(event, source, title) {
    event.preventDefault(); // Забороняємо перехід за посиланням
    playSong(source, title); // Викликаємо функцію відтворення пісні
}

// Отримуємо всі елементи списку
const listItems = document.querySelectorAll('.charts-item');

// Перебираємо кожен елемент і додаємо обробник події
listItems.forEach(function (item) {
    item.addEventListener('click', function (event) {
        // Отримуємо значення з даних, які ви витягли з бази даних
        const source = item.getAttribute('data-source'); // припустимо, що ви додали атрибут data-source
        const title = item.getAttribute('data-title'); // припустимо, що ви додали атрибут data-title

        showPlayer(event, source, title);
    });
});
