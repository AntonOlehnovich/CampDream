<?php
session_start();
?>
<h4 style="color: cyan">Здравствуйте, <?=$_SESSION['user']?>. Нажмите <a
            href="exit.php">здесь</a>, если вы хотите выйти из аккаунта!</h4><br>
<?php
$connect = new PDO('mysql:host=localhost:8889;dbname=myforum', 'root', 'root');
if (isset($_POST['comment'])){
     $name = filter_var(trim($_SESSION['user']),
         FILTER_SANITIZE_STRING);
     $comment = $_POST['comment'];
     $date = date('Y-m-d H:i:s');
     $query = $connect->query("INSERT INTO myforum.comments (name, comment, data) VALUES ('$name', '$comment', '$date')");
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форум</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<style>
    *
    {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    body
    {
        background-attachment: fixed;
        background-image: url("https://avatars.mds.yandex.net/get-pdb/28866/8fbd37a4-73d3-4c09-80ee-8e4241495894/s1200");
        background-blend-mode: multiply;
        background-color: indigo;
        background-size: cover;
        margin: 30px;
        font-family: Arial, sans-serif;
    }
    input, textarea
    {
        margin: 5px;
        width: 300px;
    }
    form
    {
        display: flex;
        flex-direction: column;
    }

    input[type="submit"]{
        position: relative;
        text-transform: uppercase;
        text-decoration: none;
        font-family: sans-serif;
        box-sizing: border-box;
        background: linear-gradient(90deg, #03a9f4, #f441a5, #ffeb3b, #03a9f4);
        background-size: 400%;
        border-radius: 30px;
        z-index: 1;
    }

    input[type="submit"]:hover{
        animation: animate 8s linear infinite;
    }

    @keyframes animate{

        0%{
            background-position: 0%;
        }
        100%{
            background-position: 400%;
        }

    }
    p, h2
    {
        color: bisque;
    }
    input[type="submit"]:before{
        content: '';
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        z-index: -1;
        background: linear-gradient(90deg, #03a9f4, #f441a5, #ffeb3b, #03a9f4);
        background-size: 400%;
        border-radius: 40px;
        filter: blur(20px);
        opacity: 0;
        transition: 0.5s;
    }

    input[type="submit"]:hover:before{
        filter: blur(20px);
        opacity: 1;
        animation: animate 8s linear infinite;
    }
    textarea{
        resize:none;
        outline:none;/*Светящаяся рамка:убераем*/
        border-width:2px;/*Ширина рамки:2px*/
        border-radius:2px;/*Скругление углов:2px*/
        font-size:18pt;/*Размер шрифта:18pt*/
        background:#ecf0f1;
        color:rgb(52, 73, 94);
    }
</style>
<form action="" method="post">
    <textarea name="comment" cols="30" rows="5" placeholder="Ваш комментарий..." required></textarea>
    <input type="submit" value="Отправить" class="btn btn-success">
</form>
<hr>
<h2>Форум</h2>
<?php
   $comments = $connect->query("SELECT * FROM comments ORDER BY data desc ");
   $comments = $comments->fetchAll(PDO::FETCH_ASSOC);
   if($comments) {
   foreach ($comments as $comment){
?>
<p><?="{$comment['data']} <b style='color: #ffeb3b' >{$comment['name']}</b> оставил(-а) комментарий: <i style='color: aquamarine'>'{$comment['comment']}'</i>"?></p>
<? }} else { ?>
<p>Здесь пока нет комментариев :(</p>
<? } ?>
</body>
</html>
