<?php
$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost:8889', 'root', 'root', 'myforum');
if(mysqli_num_rows($mysql->query("SELECT `login` FROM `users` WHERE `login` = '$login'")) > 0){
    echo "Данный логин уже зарегистрирован!";
    exit();
}
else{
    echo "Данные указаны верно. Регистрация прошла успешно!";
}

$pass = md5($pass."ghjdjf134");


$mysql->query("INSERT INTO `users` (`login`, `name`, `pass`, `email`)
VALUES('$login', '$name', '$pass', '$email')");

$mysql->close();

?>
