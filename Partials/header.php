<?php
require 'Config/database.php';
//fetch current user from database
if( isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'],FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connexion, $query);
    $avatar = mysqli_fetch_assoc($result);
}
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
    <link rel="stylesheet" href="<?= ROOT_URL?>/css/style.css">

    <!--ICONSCOUT-->

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!--GOOGLEFONTS MONTSERRAT-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- link for fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- link for css files -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <!-- link for infine loop slide from Swipperjs -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body translate="no">
    <!--START NAV-->
    <nav>
        <div class="container nav__container">
            <a href="<?= ROOT_URL?>index.php" class="nav_logo">BlogBurst</a>
            <ul class="nav__items">
                <li class="nv"><a  href="<?= ROOT_URL?>index.php">Home</a></li>
                <li class="nv"><a  href="<?= ROOT_URL?>blog.php">Blog</a></li>
                <li class="nv scroll-animation"><a href="#footer" data-nav-link>Contact</a></li>
                <?php if (isset($_SESSION['user-id'])) : ?> 
                    <li class="nv"><a href="<?= ROOT_URL?>/Admin/index.php">Dashboard</a></li>

                    <li class="nav__profile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>" alt="">
                        </div>
                        <ul>
                            <li><a href="<?= ROOT_URL?>edit-profil.php?id=<?=$_SESSION['user-id'] ?>"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;Profil</a></li>
                            <li><a href="<?= ROOT_URL?>logout.php"><i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Logout</a></li>
                        </ul>
                    </li> 
                <?php else: ?>
                    <li class="nv"><a  href="<?= ROOT_URL?>signin.php">Signin</a></li>
                <?php endif ?>
            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!--END OF NAV-->