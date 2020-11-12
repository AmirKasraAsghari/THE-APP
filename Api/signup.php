<?php

 include 'connection.php';

$name=!empty($_POST['name']) ? $_POST['name'] : '';
$email=!empty($_POST['email']) ? $_POST['email'] : '';
$password=!empty($_POST['password']) ? $_POST['password'] : '';

if(empty($name)) {
    echo "'name' field is missing";
    echo "\n";
  }
  
if(empty($email)) {
    echo "'email' field is missing";
    echo "\n";
}

if(empty($password)) {
    echo "'password' field is missing";
    echo "\n";
  }
  
  

  
if  (!empty($name) AND !empty($email) AND !empty($password)){

$sql = "SELECT * FROM Admin WHERE  admin_email = '$email'";
		$result = mysqli_query($con,$sql);
		
		if($result->num_rows > 0){
		    
			$obj = array('result'=>'email already exist',);
            $data = '{"data":'. json_encode($obj) .'}';
			 echo $data;
		}
		else
		{
            $mysql_query="INSERT INTO Admin (admin_name ,admin_email, admin_password) VALUES ('$name','$email','$password')";
            $response= mysqli_query($con,$mysql_query);
    
             if($response)
                  {
                      $obj = array('result'=>'data inserted',);
                      $data = '{"data":'. json_encode($obj) .'}';
                 }
              else
                  {
                  $obj = array( 'result'=>'data not inserted',);
                  $data = '{"data":'. json_encode($obj) .'}';  
                  }
          echo $data;

	}
    
}
  

mysqli_close($con);

?>