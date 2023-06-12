<?php
include 'Partials/header.php' ;
//get ack form data in it was an error
$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;
// $userrole = $_SESSION['add-user-data']['userrole'] ?? null;

//dellete session data
unset($_SESSION['add-user-data']);
?>




<section class="form__section" style="height: 150vh;">
    <div class="container form__section-container">
        <h2>Add User</h2>
        <form action="<?= ROOT_URL ?>/Admin/add-user-logic.php" enctype="multipart/form-data" method="POST">

            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
            <input type="text" name="lastname"  value="<?=$lastname ?>"  placeholder="Last Name">
            <input type="text" name="username"  value="<?=$username ?>"  placeholder="UserName">
            <input type="text" name="email" value="<?= $email ?>"   placeholder="Email">
            <input type="password" name="createpassword" value="<?= $createpassword ?>"   placeholder="Create Password">
            <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>"   placeholder="Confirm Password">
            <select name="userrole">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Add User</button>
            
        </form>
        <?php   if(isset($_SESSION['add-user'])) : ?>
        <div class="alert__message error">
            <p>
                <?= $_SESSION['add-user'];
                unset($_SESSION['add-user']);
                ?>                    
            </p>
        </div>
        <?php endif ?>

    </div>
</section>


<?php
include '../Partials/footer.php' ;
?>