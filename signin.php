<?php
require 'Config/database.php';
$username_email = $_SESSION['signin-data']['username_email'] ?? null ;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>responsive Multipage Blog Website</title>
​
    <!--CUSTOM STYLESHEET-->
    <link rel="stylesheet" href="css\signin.css">
    <!--ICONSCOUT-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    <!--GOOGLEFONTS MONTSERRAT-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
</head>
<body>
    <div class="login-box">
        <h2>Sign In</h2>
        
        <form action="<?= ROOT_URL?>signin-logic.php" method="POST" novalidate>
    <div class="user-box">
        <input type="text" name="username_email" value="<?=$username_email?>" required="">
        <label>Username or Email</label>
    </div>
    <div class="user-box">
    <input type="password" name="password" id="password-input" value="<?=$password?>" required="">
        <label>Password</label>
        <button type="button" id="toggle-password-button">
        <i id ="icon" class="far fa-eye"></i>
        </button>
        

    </div>
    <?php if(isset($_SESSION['signup-success'])) : ?>
        <div class="alert__message success">
            <p><?= $_SESSION['signup-success'];
                unset($_SESSION['signup-success']);
            ?></p>
        </div>
    <?php elseif(isset($_SESSION['signin'])) : ?>
        <div class="alert__message error">
            <p><?= $_SESSION['signin'];
                unset($_SESSION['signin']);
            ?></p>
        </div>
    <?php endif ?>
    <div class="button-container">
        <a class="btna">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <button type="submit" name="submit" class="btn">Sign In</button>
        </a>
        <small>Don't have an account? <a href="signup.php">Sign Up</a></small>
    </div>
</form>

        

    </div>
    <script>
         window.addEventListener('DOMContentLoaded', function() {
        var alertMessage = document.querySelector('.alert__message');
        var buttonContainer = document.querySelector('.button-container');
        var smallElement = document.querySelector('.button-container small');

        if (alertMessage) {
            buttonContainer.style.marginTop = '10px';
            buttonContainer.classList.add('message-visible');
            smallElement.style.marginTop = '20px';
        }
    });

    //toggle password button
    var togglePasswordButton = document.getElementById('toggle-password-button');
    var passwordInput = document.getElementById('password-input');
    var icon = document.getElementById('icon');

    togglePasswordButton.addEventListener('click', function() {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});


    
    </script>
</body>
</html>