<?php
    require 'connectToDB.php';

    $db = new PDO('mysql:host=localhost;dbname='.$db, $user, $pass);
    $db->exec('SET CHARACTER SET utf8');

    $str = "";
    $queryCount = "SELECT COUNT(*) as count FROM comments";
    $query = "SELECT * FROM comments JOIN users ON comments.idUser = users.idUser ORDER BY date DESC";

    //Возврат всех записей из таблиц БД. Формирование и отправка строки с данными в файл mainFunc.php
    //в метод getData()
    foreach ($db->query($query) as $inf) {
        $str = $str."|";
        $str = $str.$inf['surname']."~".$inf['name']."~".$inf['lastName']."~".$inf['email']."~".$inf['text'];
    };

    echo $str;

?>