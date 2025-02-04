<?php
$uploadDirectory = 'uploads/';

// Проверка, существует ли папка для загрузки, если нет — создать ее
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Проверка загрузки файла
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $uploadDirectory . $fileName;

    // Перемещаем файл в папку
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
        echo "Файл успешно загружен.";
    } else {
        echo "Ошибка загрузки файла.";
    }
}
?>
