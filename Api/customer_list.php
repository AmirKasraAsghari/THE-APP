<?php 

       
include 'connection.php';
       
$result =array();
$result['customer']=array();

$sql = "SELECT customer_id,customer_name,customer_email,customer_phone,customer_image,customer_status FROM Customer";
		$response = mysqli_query($con,$sql);
		
		if($response->num_rows > 0){
		    while($row = mysqli_fetch_array($response)) {
		      $index['customer_id'] =$row['0'];
              $index['customer_name'] =$row['1'];
              $index['customer_email'] =$row['2'];
              $index['customer_phone'] =$row['3'];
              $index['customer_image'] =$row['4'];
              $index['customer_status'] =$row['5'];
              array_push($result['customer'],$index);
		     
		      
		    }
		    $data = '{"data":'. json_encode($result) .'}';
		    echo $data;
		}
		else
		{
		     $obj = array( 'result'=>'no record found',);
             $data = '{"data":'. json_encode($obj) .'}'; 
             echo $data;
	    }
		

		
?>