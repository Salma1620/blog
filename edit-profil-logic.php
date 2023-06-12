<?php
require 'config/database.php' ;

if(isset($_POST['submit'])) {
    $id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);

    $previous_avatar_name = filter_var($_POST['previous_avatar_name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $firstname= filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname= filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    //valide form date
    if(!$firstname) {
        $_SESSION['edit-profil'] = "Please Add a Firstname";    
    }elseif(!$lastname){
        $_SESSION['edit-profil'] = " Please Add a Lastname" ;
    }elseif(!$avatar['name']){
        $_SESSION['edit-profil'] = "Please Add an Avatar" ;
    }else{
        //delete existing avatar is avaible
        if($avatar['name']){
            $previous_avatar_path = 'images/' . $previous_avatar_name;
            if($previous_avatar_path){
                unlink($previous_avatar_path);
            }
        }
        //WORK ON avatar
        //RENAME THE IMAGE
    $time = time();//make each image name unique
    $avatar_name = $time . $avatar['name'];
    $avatar_tmp_name = $avatar['tmp_name'];
    $avatar_destination_path = 'images/' . $avatar_name;

    //make sure file is an image

    $allowed_files = ['png', 'jpg', 'jpeg'];
    $extension = explode('.',$avatar_name);
    $extension=end($extension);
    if(in_array($extension, $allowed_files)){
       //make sure image is not too big.(2nb+)
       if($avatar['size'] < 2000000){
        //upload avatar 
        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);

       }else{
        $_SESSION ['edit-profil']= "Couldn't Update Profil , avatar Should be less than 2mb";
       }
    }else{
        $_SESSION['edit-profil'] = "Couldn't Update Profil , avatar Should be  jpg, or jpeg";

    }

   }  
    // redirect back (with form data) to edit page if there is any problem
    if ($_SESSION['edit-profil']) {
        $_SESSION['edit-profil-data']=$_POST;
        header('location: ' . ROOT_URL . 'edit-profil.php?id=' . $id);
        die();
    }
    else {
        //set avatar name if a new one was uploaded ,else keep old avatar name
        $avatar_to_insert = $avatar_name ?? $previous_avatar_name;

        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', avatar='$avatar_to_insert'  WHERE id=$id LIMIT 1"; 
        $result = mysqli_query($connexion, $query);
        if(mysqli_errno($connexion)){
            $_SESSION['edit-profil-error']="Couldn't Edit user";
            header('location: ' . ROOT_URL . 'Admin/index.php');
            die();
        }
        else{
            $_SESSION['edit-profil-success']=" $firstname , your Profil Edited Successfully";
            header('location: ' . ROOT_URL . 'Admin/index.php');
            die();
        }
    }
}