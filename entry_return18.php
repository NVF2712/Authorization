<?php
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "dumkprzu_orgforms", "123456", "dumkprzu_orgforms");

if ($mysqli == false) {
    print("error");
} else {
    // print("Соединение установлено успешно");
    $email = trim(mb_strtolower($_POST["email"]));
    $pass = trim($_POST["pass"]);

    $result = $mysqli->query ("SELECT * FROM `entryforms` WHERE `email`='$email'");
    $result = $result ->fetch_assoc();
    $pass_hash = $result ["pass"];
    
    if (password_verify ($pass, $pass_hash)) {
        print("exist"); //Такой пользователь существует
    } else {
        print("ooops"); //Такого пользователя не существует
      //  $mysqli->query("INSERT INTO `entryforms`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
    }
}