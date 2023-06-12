<?php
include 'Partials/header.php' ;
//get back form data if it is invalid
$title=$_SESSION['add-category-data']['title']??null;
$description=$_SESSION['add-category-data']['description']??null;

unset($_SESSION['add-category-data']);

?>
<section class="form__section" style="height: 90vh; margin-top: 100px;">
    <div class="container form__section-container">
        <h2>Add Category</h2>
        
        <form action="<?= ROOT_URL ?>Admin/add-category-logic.php" enctype="multipart/form-data" method="post">
            <input type="text"name="title" value="<?= $title ?>" placeholder="Title">
            <textarea rows="6" name="description" placeholder="Description"><?= $description ?></textarea>
            <div class="form__control">
                <label for="category_img">Category Image</label>
                <input type="file" name="category_img" id="category_img">
            </div>
            <button type="submit" name="submit" class="btn">Add Category</button>
           
        </form>

        <?php if(isset($_SESSION['add-category'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category']);
                    ?>
                </p>
            </div>
        <?php endif ?>

    </div>
</section>
<?php
include '../Partials/footer.php' ;
?>