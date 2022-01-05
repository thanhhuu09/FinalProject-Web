<?php
    header('Access-Control-Allow-Origin: *');

    function get_connection(){
        $host = 'localhost';
        $dbName = 'project';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbName);

        if ($conn->connect_error){
            die('Cannot connect: ' . $conn->connect_error);
        }

        return $conn;
    }
?>