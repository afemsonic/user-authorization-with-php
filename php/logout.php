<?php

logout();

/*
Checks if the existing user has a session
if it does
destroy the session and redirect to login page
*/
function logout(){
   session_start();
   if($_SESSION){
    session_destroy();
    header("Location: ../index.php");
    exit();
   } 
   else{
   echo "user does not exist";
   exit();
   }
}
   

?>

    


