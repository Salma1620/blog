<?php
include 'Partials/header.php' ;

//fetch posts from database if it set
if(isset($_GET['id'])) {
$id =filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM posts WHERE id=$id";
$result = mysqli_query($connexion, $query);
$post = mysqli_fetch_assoc($result);

}else{
  header('location: ' . ROOT_URL . 'blog.php');
  die();

}
?>

    <!-- SINGLE POST -->
    <section class="singlepost">
      <div class="singlepost__thumbnail">
        <img src="./images/<?= $post['thumbnail']?>" />
      </div>
      <div class="singlepost__container">
      <?php
              //fetch category from categories table  using category_id of post
              $category_id = $post['category_id'];
              $category_query = "SELECT * FROM categories WHERE id=$category_id";
              $category_result = mysqli_query($connexion, $category_query);
              $category = mysqli_fetch_assoc($category_result);
           
              ?>
      <a href="<?= ROOT_URL ?>category-posts.php?id=<?=$post['category_id'] ?>" class="category__butn"><?='#'. $category['title'] ?></a>
          <h2 class="blog-post__title"><?= $post['title'] ?></h2>
          <!-- <span>
              Street style is all about effortless style that looks stylish and cool without trying too hard. In this post, we'll provide tips on how to master the art of casual chic and create your own signature street style look. From incorporating statement pieces to mixing high and low fashion .
          </span> -->
          <p><?= $post['body'] ?></p>
          <?php
          $author_id = $post['author_id'];
          $author_query = "SELECT * FROM users WHERE id=$author_id";
          $author_result = mysqli_query($connexion, $author_query);
          $author = mysqli_fetch_assoc($author_result);
          
          ?>
          <div class="post__author">
              <div class="post__author-avatar">
              <img src="./images/<?= $author['avatar'] ?>" >
              </div>
              <div class="post__author-info">
              <h5> <?= "{$author['firstname']} {$author['lastname']} "?></h5>
                  <small>
                  <?= date("M d, Y -H:i",strtotime($post['date_time'])) ?>
                  </small>
              </div>
      </div>
  </section>   
    <!-- END SINGLE POST -->
   <!-- CATEGORY BUTTONS -->
    
<section class="category__buttons" >
  <div class=" category__buttons-container">
      <div class="title__posts1">
      
    <h2 class="headline headline-2 section-title" id="tag-label">
    
      <span class="span">Popular Tags</span>
    </h2>
    <p class="section-text">
      Most searched keywords
    </p>
  </div>
    <ul class="grid-list">
    <?php
        $all_categories_query ="SELECT * FROM categories ORDER BY date_time ASC";
        $all_categories = mysqli_query($connexion, $all_categories_query);
          ?>
      <?php while($category = mysqli_fetch_assoc($all_categories)) : ?>
      
        <li>
        <button class="card category__button">
        <img src="./images/<?= $category['category_img'] ?>" width="32" height="32" loading="lazy">
          <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>"class="category__buttons-container"><?= $category['title'] ?></a>            
        </button>
      </li>
      <?php endwhile ?>


    </ul>

  </div>
</section>
   <!--END OF CATEGORY BUTTONS-->
       <?php
include 'Partials/footer.php' ;
?>