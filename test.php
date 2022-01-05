<?php
    session_start();
    $error = '';
    require_once ('./connection.php');
    $sql = 'SELECT username,name,position,department,avatar FROM account where username = ?';

    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(array($_SESSION['user']));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $ex){
        $error = $ex->getMessage();
    }
    print_r($data['username'])
?>