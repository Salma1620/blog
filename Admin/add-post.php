<?php
include 'Partials/header.php' ;


//fetch category
$query = "SELECT * FROM categories";
$categories = mysqli_query($connexion, $query);

//get back from date if form was invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

// delete from data session
unset($_SESSION['add-post-data']);
?>


<section class="form__section" style="margin-top: 100px;">
    <div class="container form__section-container">
        <h2>Add Post</h2>
    
        <form action="<?= ROOT_URL ?>Admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Title">
            <select name="category">
            <?php while($category = mysqli_fetch_assoc($categories)): ?> 
               <option value="<?= $category['id'] ?>"> <?= $category['title'] ?></option>
               <?php endwhile ?>    
            </select>
            <textarea rows="10" name="body" placeholder="Body"><?= $body ?></textarea>
            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">

            </div>
            <button type="submit" name="submit" class="btn">Add Post</button>
        </form>
        <?php if(isset($_SESSION['add-post'])) : ?> 
            <div class="alert__message error">
               
            <p>
               <?= $_SESSION['add-post']; 
               unset($_SESSION['add-post']);
               ?>
            </div>
        <?php endif ?> 
    </div>
</section>

<?php
include '../Partials/footer.php' ;
?>