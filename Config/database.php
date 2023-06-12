<?php
require 'constants.php';
session_start();


//connect to the database
$connexion = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(mysqli_errno($connexion)){
    die(mysqli_error($connexion));
}
