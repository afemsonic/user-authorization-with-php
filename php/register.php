<?php

if(isset($_POST["submit"])){

$username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($username, $email, $password);
}

    //save data into the file

function registerUser($username, $email, $password){
    
    $fp=fopen('../storage/users.csv', 'a');

    $data= array('username'=>$_POST['fullname'],
        'email'=>$_POST['email'],
        'password'=>$_POST['password']);

        if(checkUserExistence($email)){
            echo "user already exists";
        }else{
    fputcsv($fp,$data);
    fclose($fp);
    echo "user registered successfully";
    }

}
    //To check if user already existed

    function checkUserExistence($email){
    $fp=fopen('../storage/users.csv', 'r');
    while(!feof($fp)){
       $col= fgetcsv($fp);
       if ($col[1]== $email){
        return true;
       }
    }
    return false; 
    }

?>