<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}
//open file and check if the email exist inside
    //if it does, replace the password

function resetPassword($email, $newpassword){
    $fp=fopen('../storage/users.csv', 'r');
    while(!feof($fp)){
       $col= fgetcsv($fp);
       if ($col[1]== $email){
        fclose($fp);  
        $col[2]=$newpassword;
        $fp= fopen('../storage/users.csv', 'w');
        fputcsv($fp,$col);
        fclose($fp);
        echo "password reset successfully";
       }
       else{
        echo "user does not exist";
        exit();
       }
    }
}


?>
 