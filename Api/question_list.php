<?php 

       
include 'connection.php';
       
$result =array();
$result['question']=array();

$sql = "SELECT question_id,question FROM Questions";
		$response = mysqli_query($con,$sql);
		
		if($response->num_rows > 0){
		    while($row = mysqli_fetch_array($response)) {
		      $index['question_id'] =$row['0'];
              $index['question'] =$row['1'];
              array_push($result['question'],$index);
		     
		      
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