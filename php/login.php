<?php
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
loginUser($email, $password);

}

function loginUser($email, $password){
    $fp=fopen('../storage/users.csv', 'r');
    while(!feof($fp)){
       $col= fgetcsv($fp);
       if($col[1]== $email && $col[2]==$password){
        $_SESSION['username']=$col[0];
        header('Location: ../dashboard.php');
        exit();
        }
       echo "<meta http-equiv=\"refresh\" content=\"0; URL=login.php\">";
       exit();
    }

}
    

?>
