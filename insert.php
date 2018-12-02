<?php
    require('config.php');

    //
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    $myname = mysqli_real_escape_string($db,$_POST['name']);
    $myemail = mysqli_real_escape_string($db,$_POST['email']);

    //bcrypt hashing
    $hash = password_hash($mypassword, PASSWORD_DEFAULT);

    $insert_1 = "insert into users (name, username, email, joined) 
        values ('$myname', '$myusername', '$myemail', now());";
    $insert_2 = "insert into login (id, username, password) values (
        (select id from users where name='$myusername'),
        '$myusername', '$hash');";

    //transaction
    $db->autocommit(FALSE);
    $db->query($insert_1);
    $db->query($insert_2);
    $db->commit();
    
    header("Location:table.php");
    
?>