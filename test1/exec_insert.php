<?php
    try{
      require_once('../include/pdo_connect.php');
      $sql = 'INSERT INTO names(name, meaning, gender) VALUES("Marcus", "The great", "male")';
      $result = $db->exec($sql);
      echo $result." row inserted with id ".$db->lastInsertId();
    }catch(Exception $e){
        $error = $e->getMessage(); 
    }
    

    if(isset($error)){
        echo $error;
    }
   
    // $numrows = $result->rowCount();
 ?>
