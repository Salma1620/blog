<?php
include 'Partials/header.php' ;
$firstname = $_SESSION['edit-profil-data']['firstname'] ?? null;
$lastname = $_SESSION['edit-profil-data']['lastname'] ?? null;

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
        <h2>Edit Profil</h2>
        <form action="<?= ROOT_URL ?>edit-profil-logic.php"  enctype="multipart/form-data" method="POST">
        <input type="hidden" name="previous_avatar_name" value="<?= $user['avatar'] ?>">

        <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="firstname">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="lastname">
            <div class="form__control">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Update Profil</button>
           
        </form>
        <?php if(isset($_SESSION['edit-profil'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['edit-profil'];
                    unset($_SESSION['edit-profil']);
                    ?>
                </p>
            </div>
        <?php endif ?>
    </div>
</section>

<?php
include 'Partials/footer.php' ;
?>