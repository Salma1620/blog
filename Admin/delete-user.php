<?php
require 'Config/database.php';
if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    //fetch user from database
    $query="SELECT * FROM users WHERE id=$id";
    $result=mysqli_query($connexion,$query);
    $user=mysqli_fetch_assoc($result);
    //make sure we got one user 
    if(mysqli_num_rows($result)==1){
        $avatar_name=$user['avatar'];
        $avatar_path='../images/' . $avatar_name;
        //delete avatar if available
        if($avatar_path){
            unlink($avatar_path);

        }
    }
    
    //FOR LATER
    //fetch all thumbnails of user's posts and delete them
    $thumbnail_query = "SELECT thumbnail FROM posts WHERE author_id=$id";
    $thumbnail_result = mysqli_query($connexion, $thumbnail_query);
    if(mysqli_num_rows($thumbnail_result) > 0) {
        while($thumbnail = mysqli_fetch_assoc($thumbnail_result)){
            $thumbnail_path = '../images/' . $thumbnail['thumbnail'];
            //delete thumbnail from images
            if($thumbnail_path) {
                unlink($thumbnail_path);
            }
        }
    }

    //delete user from database
    $delete_user_query="DELETE FROM users WHERE id=$id";
    $delete_user_query_post="DELETE FROM posts WHERE author_id=$id";
    $delete_user_result=mysqli_query($connexion,$delete_user_query);
    $delete_user_result=mysqli_query($connexion,$delete_user_query_post);
    if(mysqli_errno($connexion)){
        $_SESSION['delete-user']="Couldn't Delete '{$user['firstname']} {$user['lastname']}'" ;
    }
    else{
        $_SESSION['delete-user-success']="'{$user['firstname']} {$user['lastname']}' is Deleted" ;
    }

}
header('location: ' . ROOT_URL . 'Admin/manage-users.php');
die();