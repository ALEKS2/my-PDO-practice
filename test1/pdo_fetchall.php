<?php
    try{
      require_once('../include/pdo_connect.php');
    }catch(Exception $e){
        $error = $e->getMessage(); 
    }
    $sql = 'SELECT name, meaning, gender FROM names
                   ORDER BY name';
    $result = $db->query($sql);
    $all = $result->fetchAll(PDO::FETCH_ASSOC); //=> fetching an associative array
    // $all = $result->fetchAll(PDO::FETCH_NUM); => fetching an indexed array
       
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO-Loop</title>
</head>
<body>
    <h1>Looping directly over a SELECT QUERY</h1>
    <?php
       if(isset($error)){
           echo $error;
       }

     ?>
     
     <pre>
     <?php print_r($all); ?>
     </pre>          
     
</body>
</html>