<?php 

       
include 'connection.php';
      
$id=!empty($_POST['id']) ? $_POST['id'] : '';
$question=!empty($_POST['question']) ? $_POST['question'] : '';

  
if(empty($id)) {
    echo "'id' field is missing";
    echo "\n";
}

if(empty($question)) {
    echo "'question' field is missing";
    echo "\n";
}
  
if  (!empty($id) AND !empty($question)){
    
$sql = "UPDATE Questions SET question = '$question' WHERE question_id = '$id'";
		$result = mysqli_query($con,$sql);

             if($result)
                  {
                      $obj = array('result'=>'Question successfully updated',);
                      $data = '{"data":'. json_encode($obj) .'}';
                 }
              else
                  {
                  $obj = array( 'result'=>'failed',);
                  $data = '{"data":'. json_encode($obj) .'}';  
                  }
          echo $data;
		    
		}
		
    
		
?>