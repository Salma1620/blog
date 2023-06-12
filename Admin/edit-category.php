<?php
include 'Partials/header.php' ;
$title = $_SESSION['edit-category-data']['title'] ?? null;
$description = $_SESSION['edit-category-data']['description'] ?? null;

if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    //fetch category from database
    $query= "SELECT * FROM categories WHERE id=$id";
    $result=mysqli_query($connexion,$query);
    if(mysqli_num_rows($result)==1){
        $category=mysqli_fetch_assoc($result);
    }
    $title=$category['title']??null;
    $description=$category['description']??null;
}
?>
<section class="form__section" style="height: 90vh; margin-bottom: 50px;">
    <div class="container form__section-container">
        <h2>Edit Category</h2>
        <form action="<?= ROOT_URL ?>Admin/edit-category-logic.php"  enctype="multipart/form-data" method="POST">
        <input type="hidden" name="previous_category_img_name" value="<?= $category['category_img'] ?>">

        <input type="hidden" name="id" value="<?= $category['id'] ?>">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Title">
            <textarea rows="6" name="description" placeholder="Description"><?= $description ?></textarea>
            <div class="form__control">
                <label for="category_img">Category Image</label>
                <input type="file" name="category_img" id="category_img">
            </div>
            <button type="submit" name="submit" class="btn">Update Category</button>
           
        </form>
        <?php if(isset($_SESSION['edit-category'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['edit-category'];
                    unset($_SESSION['edit-category']);
                    ?>
                </p>
            </div>
        <?php endif ?>
    </div>
</section>

<?php
include '../Partials/footer.php' ;
?>