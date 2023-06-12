<?php
require 'Config/database.php';
if(isset($_POST['submit'])){
    //get form data
    $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description=filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_img = $_FILES['category_img'];
    if(!$title){
        $_SESSION['add-category']="Please Enter a Title";
    }elseif(!$description){
        $_SESSION['add-category']="Please Enter a Description";
    }elseif(!$category_img['name']){
        $_SESSION['add-category'] = "Please Select an Image";
    }
    //-------------------------------------------------------------------------------
    else{
        //WORK ON image
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
            if($category_img['size'] < 2_000_000){
                //upload category_img 
                move_uploaded_file($category_img_tmp_name, $category_img_destination_path);
    
            }else{
                $_SESSION ['add-category']= "File size too big, should be less than 2mb";
            }
        }else{
            $_SESSION['add-category'] = "File should be png , jpg, or jpeg";
        }
    }
    //-------------------------------------------------------------------------------
    //redirect to the add category page if an input was invalid
    if(isset($_SESSION['add-category'])){
        $_SESSION['add-category-data']=$_POST;
        header('location: ' . ROOT_URL . 'Admin/add-category.php');
        die();
    }
    else{
        //insert category into database
        $query="INSERT INTO categories (title,description,category_img) 
        VALUES ('$title','$description','$category_img_name') ";

        $result=mysqli_query($connexion,$query);
        if(mysqli_errno($connexion)){
            $_SESSION['add-category']="Couldn't add Category";
            header('location: ' . ROOT_URL . 'Admin/add-category.php');
            die();
        }
        else{
            $_SESSION['add-category-success']="Category $title added Successfully";
            header('location: ' . ROOT_URL . 'Admin/manage-categories.php');
            die();
        }
    }
}
