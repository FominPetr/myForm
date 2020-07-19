<?php
    require 'connectToDB.php';
    
    $db = new PDO('mysql:host=localhost;dbname='.$db, $user, $pass);
    $db->exec('SET CHARACTER SET utf8');
    
    $queryMail = $db->prepare('SELECT idUser, COUNT(1) as user FROM users WHERE email = :email');
    $queryMail->execute(array(':email' => $_POST['email']));
    $queryMailSafe = $queryMail->fetch();

    if($queryMailSafe['user'] <= 0){
        $queryInsert = $db->prepare("INSERT INTO users(surname,name,lastName,email) VALUES (:surname,:name,:lastName,:email)");
        $res = $queryInsert->execute(array(
            ':surname' => $_POST['surname'],
            ':name' => $_POST['name'],
            ':lastName' => $_POST['lastName'],
            ':email' => $_POST['email']
        ));
        
        $queryMail = $db->prepare('SELECT idUser, COUNT(1) as user FROM users WHERE email = :email');
        $queryMail->execute(array(':email' => $_POST['email']));
        $queryMailSafe = $queryMail->fetch();
        
        $queryInsertSecond = $db->prepare("INSERT into comments(idUser,text) VALUES(:idUser,:comment)");
        $queryInsertSecond->bindValue(':idUser', $queryMailSafe['idUser']);
        $queryInsertSecond->bindValue(':comment', $_POST['comment']);
        $res=$queryInsertSecond->execute();
        var_dump($res);
    }
    else {
        $queryInsert = $db->prepare("INSERT into comments(idUser,text) VALUES(:idUser,:comment)");
        $queryInsert->bindValue(':idUser', $queryMailSafe['idUser']);
        $queryInsert->bindValue(':comment', $_POST['comment']);
        $res=$queryInsert->execute();
        var_dump($res);
    }
        
?>