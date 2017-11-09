<?php
    try{
      require_once('../include/pdo_connect.php');
      $sql = 'DELETE FROM names WHERE name = "marcus"';
      $result = $db->exec($sql);
      echo $result." row deleted with id ".$db->lastInsertId();
    }catch(Exception $e){
        $error = $e->getMessage(); 
    }
    

    if(isset($error)){
        echo $error;
    }
   
    // $numrows = $result->rowCount();
 ?>
