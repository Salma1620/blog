<?php
require 'config/database.php' ;

if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);

    $previous_category_img_name = filter_var($_POST['previous_category_img_name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title= filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description= filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_img = $_FILES['category_img'];

    //valide form date
    if(!$title) {
        $_SESSION['edit-category'] = "You Didn't Add a Title";    
    }elseif(!$description){
        $_SESSION['edit-category'] = "You Didn't Add a  Description" ;
    }elseif(!$category_img['name']){
        $_SESSION['edit-category'] = "You Didn't Add a  Image" ;
    }else{
        //delete existing category_img is avaible
        if($category_img['name']){
            $previous_category_img_path = '../images/' . $previous_category_img_name;
            if($previous_category_img_path){
                unlink($previous_category_img_path);
            }
        }
        //WORK ON category_img
        //RENAME THE IMAGE
    $time = time();//make each image name unique
    $category_img_name = $time . $category_img['name'];
    $category_img_tmp_name = $category_img['tmp_name'];
    $category_img_destination_path = '../images/' . $category_img_name;

    //make sure file is an image

    $allowed_files = ['png', 'jpg', 'jpeg'];
    $extension = explode('.',$category_img_name);
    $extension=end($extension);
    if(in_array($extension, $allowed_files)){
       //make sure image is not too big.(2nb+)
       if($category_img['size'] < 2000000){
        //upload category_img 
        move_uploaded_file($category_img_tmp_name, $category_img_destination_path);

       }else{
        $_SESSION ['edit-category']= "Couldn't Update Category, Should be less than 2mb";
       }
    }else{
        $_SESSION['edit-category'] = "Couldn't Update Category, Should be  jpg, or jpeg";

    }

   }  
    // redirect back (with form data) to add-category page if there is any problem
    if ($_SESSION['edit-category']) {
        $_SESSION['edit-category-data']=$_POST;
        header('location: ' . ROOT_URL . 'Admin/edit-category.php?id='. $id);
        die();
    }
    else {
        //set category_img name if a new one was uploaded ,else keep old category_img name
        $category_img_to_insert = $category_img_name ?? $previous_category_img_name;

        $query = "UPDATE categories SET title='$title', description='$description',category_img='$category_img_to_insert' where id=$id "; 
        $result = mysqli_query($connexion, $query);
        if(mysqli_errno($connexion)){
            $_SESSION['edit-category']="Couldn't Edit Category";
            header('location: ' . ROOT_URL . 'Admin/edit-category.php');
            die();
        }
        else{
            $_SESSION['edit-category-success']="Category $title Edited Successfully";
            header('location: ' . ROOT_URL . 'Admin/manage-categories.php');
            die();
        }
    }
}