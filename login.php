<?php

session_start();

include 'config.php'; 
if (isset($_SESSION['uid'])) {
	$userId=$_SESSION['uid'];
}


if(isset($_POST['email'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $profile = mysqli_fetch_assoc(mysqli_query($con,"select * from user where email='$email'"));

    if($profile)
    {
        if($password==$profile['password'])
        {
         
            $_SESSION['uid'] = $profile['id'];
            $_SESSION['email'] = $profile['email'];
            $result=1;
        }
        else
        {
            $result=2;
            
        }
    }
    else
    {
        $result=3;
    }

    $data=array();
    $data['result']=$result;
    echo json_encode($data);
}



if(isset($_POST['name'])){

    $name = $_POST['name'];
    $email = $_POST['signemail'];
    $password = $_POST['password'];
    $profile = mysqli_query($con,"select * from user where email='$email'");
    if (mysqli_num_rows($profile)<1) {
        
        mysqli_query($con,"INSERT INTO `user`( `name`, `email`, `password`) VALUES ('$name','$email','$password')");
        if ($con->insert_id>0) {
            $result=1;  
        }else{
            $result=$con->error;
        }
    }else{
        $result=2; 
    }

    $data=array();
    $data['result']=$result;
    echo json_encode($data);
}

?>