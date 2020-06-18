<?php
session_start();
session_destroy();
header('Location: http://localhost:8888/Сайт%20лагеря%20Мечта/index.html');
?>