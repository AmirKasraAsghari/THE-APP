<?php 

       
        include 'connection.php';
       
$email=!empty($_POST['email']) ? $_POST['email'] : '';
$password=!empty($_POST['password']) ? $_POST['password'] : '';


  
if(empty($email)) {
    echo "'email' field is missing";
    echo "\n";
}

if(empty($password)) {
    echo "'password' field is missing";
    echo "\n";
  }
  

  
if  (!empty($email) AND !empty($password)){

$sql = "SELECT admin_id,admin_name,admin_email FROM Admin WHERE  admin_email = '$email' And admin_password = '$password' ";
		$result = mysqli_query($con,$sql);
		
		if($result->num_rows > 0){
		    while($row = $result->fetch_assoc()) {
		      $obj = array('id'=>$row["admin_id"],'name' => $row["admin_name"],'email' => $row["admin_email"]);
		      $data = '{"data":'. json_encode($obj) .'}'; 
		      echo $data;
		    }
		}
		else
		{
		     $obj = array( 'result'=>'no record found',);
             $data = '{"data":'. json_encode($obj) .'}'; 
             echo $data;
		}
		
}
		
?>