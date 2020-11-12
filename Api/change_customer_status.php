<?php 

       
include 'connection.php';
      
$id=!empty($_POST['id']) ? $_POST['id'] : '';
$status=!empty($_POST['status']) ? $_POST['status'] : '';

  
if(empty($id)) {
    echo "'id' field is missing";
    echo "\n";
}

if($status != 0 AND $status != 1) {
    echo "'status' field is missing";
    echo "\n";
}else{
  
if  (!empty($id)){
    
    if ($status == 1){
      $sql = "UPDATE Customer SET customer_status = '$status' WHERE customer_id = '$id'";
		$result = mysqli_query($con,$sql);  
    }else{
        $sql = "UPDATE Customer SET customer_status = '0' WHERE customer_id = '$id'";
		$result = mysqli_query($con,$sql);  
    }
    


             if($result)
                  {
                      $obj = array('result'=>'Status successfully updated',);
                      $data = '{"data":'. json_encode($obj) .'}';
                 }
              else
                  {
                  $obj = array( 'result'=>'failed',);
                  $data = '{"data":'. json_encode($obj) .'}';  
                  }
          echo $data;
		    
		}
}	
    
		
?>