<?php

 include 'connection.php';

$question=!empty($_POST['question']) ? $_POST['question'] : '';

if(empty($question)) {
    echo "'question' field is missing";
    echo "\n";
  }
 
if  (!empty($question)){


            $mysql_query="INSERT INTO Questions (question ) VALUES ('$question')";
            $response= mysqli_query($con,$mysql_query);
    
             if($response)
                  {
                      $obj = array('result'=>'question added',);
                      $data = '{"data":'. json_encode($obj) .'}';
                 }
              else
                  {
                  $obj = array( 'result'=>'question not added',);
                  $data = '{"data":'. json_encode($obj) .'}';  
                  }
          echo $data;
    
}
  

mysqli_close($con);

?>