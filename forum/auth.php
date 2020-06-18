<?php
session_start();
$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
$pass = md5($pass."ghjdjf134");//хэширование
$mysql = new mysqli('localhost:8889', 'root', 'root', 'myforum');
$result = $mysql->query("SELECT * FROM `users` WHERE `login`='$login' AND `pass`='$pass'");
$user = $result->fetch_assoc();
if(count((array)$user) == 0){
    echo "Произошла ошибка! Такого пользователся не существует! Проверьте введённые вами данные!";
    exit();
}

$_SESSION['user']=$user['login'];

$mysql->close();

header('Location: http://localhost:8888/Сайт%20лагеря%20Мечта/forum/forum.php');

?>

