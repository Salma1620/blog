<?php
require 'Config/constants.php';
//destroy all session and redirect the user to home page
//il n'a pas fonctionner sans ces deux lignes suivantes
session_start();
session_unset();
session_destroy();
header('location: ' . ROOT_URL);
die();
?>