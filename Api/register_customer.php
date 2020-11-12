<?php

 include 'connection.php';



if(isset($_POST['image']))
{
    $target_dir='Images/';
    $image=$_POST['image'];
    
    $name=!empty($_POST['name']) ? $_POST['name'] : '';
    $email=!empty($_POST['email']) ? $_POST['email'] : '';
    $password=!empty($_POST['password']) ? $_POST['password'] : '';
    $phone=!empty($_POST['phone']) ? $_POST['phone'] : '';
    
     $imageStore=rand()."_".time().".jpeg";
    $target_dir = $target_dir."/".$imageStore;
    file_put_contents($target_dir, base64_decode($image));
    
    
    $select= "INSERT INTO Customer (customer_name ,customer_email, customer_password,customer_phone,customer_image) VALUES ('$name','$email','$password','$phone','$imageStore')";
    $responce = mysqli_query($con,$select);
    
    if($responce)
    {
        $obj = array( 'result'=>'jh',);
             $data = '{"data":'. json_encode($obj) .'}'; 
             echo $data;
    }
    else
    {
        $obj = array( 'result'=>'no rechgjgkhjkord found',);
             $data = '{"data":'. json_encode($obj) .'}'; 
             echo $data;
    }
}
else
    {
         $obj = array( 'result'=>'no record fougjgnd',);
             $data = '{"data":'. json_encode($obj) .'}'; 
             echo $data;
    }
    
?>