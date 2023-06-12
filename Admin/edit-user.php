<?php
include 'Partials/header.php' ;
$firstname = $_SESSION['edit-user-data']['firstname'] ?? null;
$lastname = $_SESSION['edit-user-data']['lastname'] ?? null;

if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    //fetch user from database
    $query= "SELECT * FROM users WHERE id=$id";
    $result=mysqli_query($connexion,$query);
    if(mysqli_num_rows($result)==1){
        $user=mysqli_fetch_assoc($result);
    }
    $firstname=$user['firstname']??null;
    $lastname=$user['lastname']??null;
}
?>
<section class="form__section" style="height: 90vh; margin-bottom: 50px;">
    <div class="container form__section-container">
        <h2>Edit user</h2>
        <form action="<?= ROOT_URL ?>Admin/edit-user-logic.php"  enctype="multipart/form-data" method="POST">
        <input type="hidden" name="previous_avatar_name" value="<?= $user['avatar'] ?>">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="Firstname">
            <textarea rows="4" name="lastname" placeholder="Lastname"><?= $lastname ?></textarea>
            <div class="form__control">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Update User</button>
           
        </form>
        <?php if(isset($_SESSION['edit-user'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['edit-user'];
                    unset($_SESSION['edit-user']);
                    ?>
                </p>
            </div>
        <?php endif ?>
    </div>
</section>

<?php
include '../Partials/footer.php' ;
?>