<?php
    try{
      require_once('../include/pdo_connect.php');
      $sql = 'INSERT INTO names(name, meaning, gender) VALUES("ALEKZANDER", "The great", "male")';
      $result = $db->query($sql);
      var_dump($result);
    }catch(Exception $e){
        $error = $e->getMessage(); 
    }
    

    if(isset($error)){
        echo $error;
    }
   
    // $numrows = $result->rowCount();
 ?>
