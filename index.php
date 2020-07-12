<!DOCTYPE html>

<?php
    require 'connectToDB';
    
    $db = new PDO('mysql:host=localhost;dbname='.$db, $user, $pass);
    $dbh->exec('SET CHARACTER SET utf8');
    echo <?php ?>;
?>
<html lang="ru">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/main.css" />
    <title>Тестовое задание</title>
</head>

<body>
    <form class="decor">
        <div class="form-inner">
            <h3>Написать нам</h3>
            <input type="text" placeholder="Username">
            <input type="email" placeholder="Email">
            <textarea placeholder="Сообщение..." rows="3"></textarea>
            <input type="submit" value="Отправить">
        </div>
    </form>
</body>
</html>