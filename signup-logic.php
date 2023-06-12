<?php
session_start();
require 'Config/database.php';


//get signup form data if signup button was clicked

if(isset($_POST['submit'])){ //si la variable $_POST['submit'] existe, isset() retourne true, sinon elle retourne false.

    /*La fonction "filter_var" est utilisée avec deux arguments : le premier argument est la valeur du champ "firstname" envoyée via le formulaire,
     et le deuxième argument est le filtre de nettoyage à appliquer à cette valeur Dans ce cas, le filtre utilisé est "FILTER_SANITIZE_FULL_SPECIAL_CHARS". 
     Ce filtre supprime tous les caractères spéciaux (comme <, >, &, etc.) de la chaîne de caractères passée en entrée, sauf les guillemets doubles ("), les guillemets simples ('),
      les signes de dollar ($) et les signes d'arobase (@). Les caractères spéciaux sont remplacés par leur entité HTML correspondante.*/ 

    $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
    $lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    //echo $firstname . $lastname . $username . $email . $createpassword . $confirmpassword;
    //var_dump($avatar);
   // print_r($avatar);
    //Array ( [name] => Capture d’écran (14).png [type] => image/png [tmp_name] => C:\wamp64\tmp\php97BB.tmp [error] => 0 [size] => 335002 ) douaedouae

    //validate input values

    if(!$firstname){
        $_SESSION['signup'] = "Please enter your First Name";
    }
    elseif(!$lastname){
        $_SESSION['signup'] = "Please enter your Last Name";
    }
    elseif(!$username){
        $_SESSION['signup'] = "Please enter your UserName";
    }
    elseif(!$email){
        $_SESSION['signup'] = "Please enter a valid Email";
    }
    elseif(strlen($createpassword) < 8 || strlen($confirmpassword) < 8){
        $_SESSION['signup'] = "Password should be 8+ characters ";
    }
    elseif(!$avatar['name']){
        $_SESSION['signup'] = "Please add avatar";
    }
    else{
        //check if passwords don't match
        if($createpassword !== $confirmpassword){
            $_SESSION['signup'] = "Passwords do not match";
        }
        else{
            //hash password
            $hashed_password = password_hash($createpassword,PASSWORD_DEFAULT);
            echo $createpassword . '</br>';
            echo $hashed_password;
            //check if username or email already exist in database
            $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

            $user_check_result = mysqli_query($connexion,$user_check_query);
            //mysqli_query() permet d'exécuter une requête SQL elle prend en arguments : la variable de connexion à la base de données et La requête SQL.
            if(mysqli_num_rows($user_check_result) > 0){
                $_SESSION['signup'] = "Username or Email already exist";
            }
            else{
                //WORK ON AVATAR 
                //rename avatar
                $time = time(); //make each image name unique using current timestamp

                /*La fonction "time()" est une fonction prédéfinie en PHP qui renvoie le temps actuel en secondes depuis le 1er janvier 1970 à 00:00:00 UTC (temps Unix).
                 C'est un nombre entier (int) qui représente le nombre de secondes écoulées depuis cette date de référence. */

                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                //make sure file is an image
                $allowed_files = ['png','jpg','jpeg'];
                $extention = explode('.',$avatar_name); /* explode divise le nom de fichier "$avatar_name" en deux parties : le nom proprement dit et l'extension du fichier.
                
                 Ensuite, la fonction "end" retourne la dernière valeur du tableau, qui correspond à l'extension du fichier */
                $extention = end($extention);
        

                if(in_array($extention,$allowed_files)){
                //make sure image is not too large (1mb+)
                    if($avatar['size'] < 1000000 ){
                        echo '</br>';
                        echo "size : " .$avatar['size'];
                        //upload avatar
                        move_uploaded_file($avatar_tmp_name,$avatar_destination_path);
                        /*le code utilise la fonction "move_uploaded_file" pour déplacer le fichier de son emplacement temporaire $avatar_tmp_name
                         vers son emplacement définitif $avatar_destination_path */
                    }
                    else{
                        $_SESSION['signup'] = 'File size too big . Should be less than 1mb';
                    }
                }
                else{
                    $_SESSION['signup'] = "File should be png, jpg or jpeg";
                }
            }
        }
    }
    //redirect back to signup page if there was any problem 
    if(isset($_SESSION['signup'])){
        
    //pass form data back to signup page
    print_r($_POST);
    $_SESSION['signup-data'] = $_POST;
    header('location: ' . ROOT_URL . 'signup.php');
    die();
    }
    else{
        //insert new user into users table
        $insert_user_query = "INSERT INTO users SET firstname='$firstname' ,lastname='$lastname',username='$username',email='$email' , password='$hashed_password', avatar='$avatar_name' , is_admin=0";
        $insert_user_result = mysqli_query($connexion,$insert_user_query);
        if(!mysqli_errno($connexion)){
            unset($_SESSION['signup-data']);
            $_SESSION['signup-success'] = "Registration successful. Please log in";
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }

    }
    
}  


else{
    //if button wasn't clicked , bounce back to signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}
?>