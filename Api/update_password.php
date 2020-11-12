<?php 

       
include 'connection.php';
      
$id=!empty($_POST['id']) ? $_POST['id'] : '';
$old_password=!empty($_POST['old_password']) ? $_POST['old_password'] : '';
$new_password=!empty($_POST['new_password']) ? $_POST['new_password'] : '';


  
if(empty($id)) {
    echo "'id' field is missing";
    echo "\n";
}

if(empty($old_password)) {
    echo "'old_password' field is missing";
    echo "\n";
  }
  
if(empty($new_password)) {
   echo "'new_password' field is missing";    
   echo "\n";
 }
  

  
if  (!empty($id) AND !empty($old_password) AND !empty($new_password)){
    
$sql = "SELECT admin_password FROM Admin WHERE  admin_id = '$id' AND admin_password = '$old_password'";
		$result = mysqli_query($con,$sql);
		
		if($result->num_rows > 0){
		    $mysql_query = "UPDATE Admin SET admin_password = '$new_password' WHERE admin_id = '$id'";
		$response= mysqli_query($con,$mysql_query);
    
             if($response)
                  {
                      $obj = array('result'=>'passowrod successfully updated',);
                      $data = '{"data":'. json_encode($obj) .'}';
                 }
              else
                  {
                  $obj = array( 'result'=>'failed',);
                  $data = '{"data":'. json_encode($obj) .'}';  
                  }
          echo $data;
		    
		}
		else
		{
		     $obj = array( 'result'=>'old password incorrect',);
             $data = '{"data":'. json_encode($obj) .'}'; 
             echo $data;
		}
    

		
}
		
?>