<?php
require 'config/database.php' ;

if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title= filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body= filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id= filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];
  
    $minLength_title = 25; 
    $maxLength_title =  65;
    $minLength_body = 130;

    

    //valide form date
    if(!$title) {
        $_SESSION['edit-post'] = "Couldn't Update Post";    
    } elseif (!$category_id){
        $_SESSION['edit-post'] = "Couldn't Update Post"; 
    }elseif(!$body){
        $_SESSION['edit-post'] = "Couldn't Update Post" ;
    }
    elseif (strlen($title) < $minLength_title) {
        // Affichage de la session ou d'un message d'erreur
        $_SESSION['edit-post'] = "Title Should be 20+ characters";
      }
    elseif(strlen($body) < $minLength_body){
          $_SESSION['edit-post'] = "Description Should be 100+ characters";
        }
    elseif (strlen($title) > $maxLength_title) {
            // Affichage de la session ou d'un message d'erreur
            $_SESSION['edit-post'] = "Title Should be 60- characters";
          }
    else{
        //delete existing thumbnail is avaible
        if($thumbnail['name']){
            $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
            if($previous_thumbnail_path){
                unlink($previous_thumbnail_path);
            }
        }
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
       if($thumbnail['size'] < 2000000){
        //upload thumbnail 
        move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);

       }
       else{
        $_SESSION ['edit-post']= "Couldn't Update Post, Should be less than 2mb";
       }
    }else{
        $_SESSION['edit-post'] = "Couldn't Update Post Should be jpg , or jpeg";

    }


   }  
    // redirect back (with form data) to add-post page if there is any problem
    if ($_SESSION['edit-post']) {
        header('location: ' . ROOT_URL . 'Admin/');
        die();
    }else {
      //set thumbnail name if a new one was uploaded ,else keep old thumbnail name
      $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

      $query = "UPDATE posts SET title='$title',body='$body',thumbnail='$thumbnail_to_insert',
      category_id=$category_id WHERE id=$id LIMIT 1"; 
      $result = mysqli_query($connexion, $query);
    }
      if(!mysqli_errno($connexion)){
          $_SESSION['edit-post-success'] = "Post Updated Successfully";
          
      }

    

}   

header('location: ' .ROOT_URL . 'Admin/');
die();