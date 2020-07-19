<?php
    require 'connectToDB.php';

    $db = new PDO('mysql:host=localhost;dbname='.$db, $user, $pass);
    $db->exec('SET CHARACTER SET utf8');
    
    $name = strip_tags(trim($_POST['name']));
    $surname = strip_tags(trim($_POST['surname']));
    $lastName = strip_tags(trim($_POST['lastName']));
    $email = strip_tags(trim($_POST['email']));
    $comment = strip_tags(trim($_POST['comment']));
    
    //Подготовка SQL запроса и его выполнение для исключения sql-инъекций.
    $queryMail = $db->prepare('SELECT idUser, COUNT(1) as user FROM users WHERE email = :email');
    $queryMail->execute(array(':email' => $email));
    $queryMailSafe = $queryMail->fetch();

    //Проверка существования введенного email. В случае если он не существует,
    //то сначала добавляется пользователь, а потом его комментарий.
    if ($queryMailSafe['user'] <= 0) {
        $queryInsert = $db->prepare("INSERT INTO users(surname,name,lastName,email)
            VALUES(:surname,:name,:lastName,:email)");
        $res = $queryInsert->execute(array(
            ':surname' => $surname,
            ':name' => $name,
            ':lastName' => $lastName,
            ':email' => $email
        ));

       $queryMail = $db->prepare('SELECT idUser, COUNT(1) as user FROM users WHERE email = :email');
       $queryMail->execute(array(':email' => $email));
       $queryMailSafe = $queryMail->fetch();

       $queryInsertSecond = $db->prepare("INSERT into comments(idUser,text,date) VALUES(:idUser,:comment,NOW())");
       $queryInsertSecond->bindValue(':idUser', $queryMailSafe['idUser']);
       $queryInsertSecond->bindValue(':comment', $comment);
       $res=$queryInsertSecond->execute();
    } else {
        $queryInsert = $db->prepare("INSERT into comments(idUser,text,date) VALUES(:idUser,:comment,NOW())");
        $queryInsert->bindValue(':idUser', $queryMailSafe['idUser']);
        $queryInsert->bindValue(':comment', $comment);
        $res=$queryInsert->execute();
    }
?>