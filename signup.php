<?php 
require 'Config/database.php';

//get back form data if there was a registration error
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

unset($_SESSION['signup-data']);


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
    <link rel="stylesheet" href="css\signup.css">
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="login-box">
        <h2>Sign Up</h2>
        
        <form action="<?= ROOT_URL?>signup-logic.php" enctype="multipart/form-data" method="POST" novalidate >
            <div class="boox">
            <div class="user-box">
                <input type="text" name="firstname" value="<?=$firstname?>" required="">
                <label>First Name</label>
              </div>
              <div class="user-box">
                <input type="text" name="lastname" value="<?=$lastname?>" required="">
                <label>Last Name</label>
              </div>
              <div class="user-box">
                <input type="text" name="username" value="<?=$username?>" required="">
                <label>UserName</label>
              </div>
              <div class="user-box">
                <input type="text" name="email" value="<?=$email?>" required="">
                <label>Email</label>
              </div>
              <div class="user-box">
                <input type="password" id="password-input1" name="createpassword" value="<?=$createpassword?>" required="">
                <label>Create Password</label>
                <button type="button" id="toggle-password1-button">
                <i id ="icon1" class="far fa-eye"></i>
                </button>
              </div>
    
              <div class="user-box">
                <input type="password" id="password-input2" name="confirmpassword" value="<?=$confirmpassword?>" required="">
                <label>Confirm Password</label>
                <button type="button" id="toggle-password2-button">
                <i id ="icon2" class="far fa-eye"></i>
                </button>
              </div>
              
            </div>
              <div class="file" >
                <label>Avatar</label>
               <input type="file" name="avatar">
              </div>
              
              <?php if(isset($_SESSION['signup'])) : ?>
                  <div class="alert__message error">
                  <p>
                  <?= $_SESSION['signup'];?>
                  <?php unset($_SESSION['signup']); ?>
                  </p>
                  </div>
              <?php endif ?>
                
            <div class="button-container">
              <a class="btna">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <button type="submit" name="submit" class="btn">Sign Up</button>
             </a>
            <small>Don't have an account? <a href="signin.php">Sign In</a></small>
        </div>
        </form>
        
        <script>
         window.addEventListener('DOMContentLoaded', function() {
        var alertMessage = document.querySelector('.alert__message');
        var buttonContainer = document.querySelector('.button-container');
        var smallElement = document.querySelector('.button-container small');

        if (alertMessage) {
            buttonContainer.style.marginTop = '0px';
            buttonContainer.classList.add('message-visible');
            smallElement.style.marginTop = '10px';
        }
    });
    // Toggle password button
var togglePasswordButton1 = document.getElementById('toggle-password1-button');
var togglePasswordButton2 = document.getElementById('toggle-password2-button');
var passwordInput1 = document.getElementById('password-input1');
var icon1 = document.getElementById('icon1');
var passwordInput2 = document.getElementById('password-input2');
var icon2 = document.getElementById('icon2');

togglePasswordButton1.addEventListener('click', function() {
    if (passwordInput1.type === 'password') {
        passwordInput1.type = 'text';
        icon1.classList.remove('fa-eye');
        icon1.classList.add('fa-eye-slash');
    } else {
        passwordInput1.type = 'password';
        icon1.classList.remove('fa-eye-slash');
        icon1.classList.add('fa-eye');
    }
});

togglePasswordButton2.addEventListener('click', function() {
    if (passwordInput2.type === 'password') {
        passwordInput2.type = 'text';
        icon2.classList.remove('fa-eye');
        icon2.classList.add('fa-eye-slash');
    } else {
        passwordInput2.type = 'password';
        icon2.classList.remove('fa-eye-slash');
        icon2.classList.add('fa-eye');
    }
});

    </script>
    </div>

</body>
</html>