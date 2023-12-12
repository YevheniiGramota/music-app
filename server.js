const express = require('express');
const multer = require('multer');
const path = require('path');

const app = express();
const upload = multer({ dest: 'uploads/' });

app.use(express.static('public'));

app.post('/upload', upload.single('music'), (req, res) => {
  // Файл доступен в req.file
  console.log(req.file);
  res.send('Файл успешно загружен.');
});

app.listen(3000, () => {
  console.log('Сервер запущен на порту 3000');
});
