<?php
require 'config/database.php';
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    // fetch category from database in order to delete category_img from folder
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connexion, $query);

    //make sure only 1record/category was fetched
    if(mysqli_num_rows($result) == 1){
        $categories = mysqli_fetch_assoc($result);
        $category_img_name = $categories['category_img'];

        $category_img_path = '../images/' . $category_img_name;
        echo $category_img_path;
        if($category_img_path) {
        unlink($category_img_path);

        //delete post from database
        $delete_category_query = "DELETE FROM categories WHERE id=$id LIMIT 1";
        $delete_category_result = mysqli_query($connexion,$delete_category_query);

        if(!mysqli_errno($connexion)) {
            $_SESSION['delete-category-success'] = "Category Deleted Successfully";
        }
       }
   
    }
}  

header('location: ' . ROOT_URL . 'Admin/manage-categories.php');
die();