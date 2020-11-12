<?php 

       
include 'connection.php';
      
$id=!empty($_POST['id']) ? $_POST['id'] : '';


  
if(empty($id)) {
    echo "'id' field is missing";
    echo "\n";
}

  
if  (!empty($id)){
    
$sql = "DELETE FROM Questions WHERE  question_id = '$id'";
		$result = mysqli_query($con,$sql);

             if($result)
                  {
                      $obj = array('result'=>'Question successfully deleted',);
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