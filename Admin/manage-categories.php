<?php
include 'Partials/header.php' ;
//fetch categories from database
$query="SELECT * FROM categories ORDER BY title";
$categories=mysqli_query($connexion,$query);

?>

<section class="dashboard">
    <?php if(isset($_SESSION['add-category-success'])) :  //shows if the category added successfully   ?> 
        <div class="alert__message success container">
            <p><?= $_SESSION['add-category-success'];
                 unset($_SESSION['add-category-success']);?>
            </p>
        </div>
    <?php elseif(isset($_SESSION['add-category'])) :  //shows if the category was not added   ?> 
        <div class="alert__message error container">
            <p><?= $_SESSION['add-category'];
                 unset($_SESSION['add-category']);?>
            </p>
        
        </div> <?php elseif(isset($_SESSION['edit-category-success'])) :  //shows if the  category edited successfully  ?> 
        <div class="alert__message success container">
            <p><?= $_SESSION['edit-category-success'];
                 unset($_SESSION['edit-category-success']);?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['edit-category-error'])) :  //shows if the  category edited not successfully  ?> 
        <div class="alert__message error container">
            <p><?= $_SESSION['edit-category-error'];
                 unset($_SESSION['edit-category-error']);?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['delete-category-success'])) :  //shows if the  category deleted successfully  ?> 
        <div class="alert__message success container">
            <p><?= $_SESSION['delete-category-success'];
                 unset($_SESSION['delete-category-success']);?>
            </p>
        </div>
    <?php endif ?>
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
           <ul>
            <li>
                <a href="add-post.php"><i class="uil uil-pen"></i>
                <h5>Add Post</h5>
                </a>
            </li>
            <li>
                <a href="index.php"><i class="uil uil-postcard"></i>
                <h5>Manage Post</h5>
                </a>
            </li>

            <?php if(isset($_SESSION['user_is_admin'])): ?>
            <li>
                <a href="add-user.php"><i class="uil uil-user-plus"></i>
                <h5>Add User</h5>
                </a>
            </li>
            <li>
                <a href="manage-users.php"><i class="uil uil-users-alt"></i>
                <h5>Manage User</h5>
                </a>
            </li>
            <li>
                <a href="add-category.php"><i class="uil uil-edit"></i>
                <h5>Add Category</h5>
                </a>
            </li>
            <li>
                <a href="manage-categories.php" class="active"><i class="uil uil-list-ul"></i>
                <h5>Manage Categories</h5>
                </a>
            </li>
            <?php endif ?>
            
           </ul>
        </aside>
        <main>
          <h2 class="headline headline-2 section-title">
            <span class="span">Manage categories</span>
          </h2>            
          <?php if(mysqli_num_rows($categories)>0) : ?>
          <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                     <?php while($category=mysqli_fetch_assoc($categories)) : ?>
                    <tr>
                        <td><?= $category['title'] ?></td>
                        <td><a href="<?= ROOT_URL ?>Admin/edit-category.php?id=<?= $category['id'] ?>" 
                        class="table_btn btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>Admin/delete-category.php?id=<?= $category['id'] ?>" 
                        class="table_btn btn sm">Delete</a></td>                    
                    </tr>
                    <?php endwhile ?>
                
                </tbody>
            </table>
            <?php else : ?>
                <div class="alert__message error"><?= "No Category found " ?></div>
            <?php endif ?>    
        </main>
    </div>
</section>

<?php
include '../Partials/footer.php' ;
?>