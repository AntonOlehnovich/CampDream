<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация | Авторизация на форуме</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/check.js"> </script>
</head>
<body>
<section>
<div class="container">
    <?php
    if($_SESSION['user'] == ''):
    ?>
    <div class="user signinBx">
        <div class="imgBx"><img src="css/1.jpg"></div>
        <div class="formBx">
            <form action="auth.php" method="post">
                <h2>Sign In</h2>
                <input type="text" name="login" id="login" placeholder="Username">
                <input type="password" name="pass" id="pass" placeholder="Password">
                <input type="submit" name="" value="Login">
                <p class="signup">Don't have an account ? <a href="#" onclick="toggleForm();">Sign Up.</a></p>
            </form>
        </div>
    </div>
    <div class="user signupBx">
        <div class="formBx">
            <form action="check.php" method="post" onsubmit="return ValidateForm()" name="myForm">
                <h2>Create an Account</h2>
                <input type="text" name="login" id="login" placeholder="Username">
                <input type="text" name="name" id="name" placeholder="Name">
                <input type="password" name="pass" id="pass" placeholder="Create Password">
                <input type="email" name="email" id="email" placeholder="Email Address">
                <input type="submit" name="" value="Sign Up">
                <p class="signup">Already have an account ? <a href="#" onclick="toggleForm();">Sign In.</a></p>
            </form>
        </div>
        <div class="imgBx"><img src="css/2.jpg"></div>
    </div>
</div>
</section>
<?php  else:
    session_destroy();
    header('Location: http://localhost:8888/Сайт%20лагеря%20Мечта/index.html');?>

<?php  endif;?>
<script type="text/javascript">
    function toggleForm() {
        var container = document.querySelector('.container');
        container.classList.toggle('active');
    }
</script>
</body>
</html>