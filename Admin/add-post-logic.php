<?php
require 'config/database.php' ;

if(isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title= filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body= filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id= filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];
  
    $minLength_title = 25; 
    $maxLength_title =  65;
    $minLength_body = 130;

    //valide form date
    if(!$title) {
        $_SESSION['add-post'] = "Please Entrer Post Title" ;    
    } elseif (!$category_id){
        $_SESSION['add-post'] = "Please Select Post Category"; 
    }elseif(!$body){
        $_SESSION['add-post'] = "Please Entrer Post Body" ;
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = "Please Choose Post Image";
    }
    elseif (strlen($title) < $minLength_title) {
        // Affichage de la session ou d'un message d'erreur
        $_SESSION['add-post'] = "Title should be 25+ characters";
      }
    elseif(strlen($body) < $minLength_body){
          $_SESSION['add-post'] = "Description should be 100+ characters";
        }
    elseif (strlen($title) > $maxLength_title) {
            // Affichage de la session ou d'un message d'erreur
            $_SESSION['add-post'] = "Title should be 60- characters";
          }
    else{
        //WORK ON THUMBNAIL
        //RENAME THE IMAGE
    $time = time();//make each image name unique
    $thumbnail_name = $time . $thumbnail['name'];
    $thumbnail_tmp_name = $thumbnail['tmp_name'];
    $thumbnail_destination_path = '../images/' . $thumbnail_name;

    //make sure file is an image

    $allowed_files = ['png', 'jpg', 'jpeg'];
    $extension = explode('.',$thumbnail_name);
    $extension=end($extension);
    if(in_array($extension, $allowed_files)){
       //make sure image is not too big.(2nb+)
       if($thumbnail['size'] < 2_000_000){
        //upload thumbnail 
        move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);

       }else{
        $_SESSION ['add-post']= "File size too big, should be less than 2mb";
       }
    }else{
        $_SESSION['add-post'] = "File should be png , jpg, or jpeg";

    }

   }  
    // redirect back (with form data) to add-post page if there is any problem
    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-post.php');
        die();
    }else {
      //insert post into database
      $query = "INSERT INTO posts (title, body, thumbnail, category_id, author_id) VALUES ('$title','$body','$thumbnail_name',$category_id, $author_id)";
      $result = mysqli_query($connexion, $query);
 
      if(!mysqli_errno($connexion)){
          $_SESSION['add-post-success'] = "New Post added Successfully";
          header('location: ' .ROOT_URL . 'Admin/');
          die();
          
      }

    }

}   

header('location: ' .ROOT_URL . 'Admin/add-post.php');
die();