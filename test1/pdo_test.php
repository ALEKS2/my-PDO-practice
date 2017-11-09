<?php
    try{
      require_once('../include/pdo_connect.php');
    }catch(Exception $e){
        $error = $e->getMessage(); 
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdo-test</title>
</head>
<body>
<h1>Connecting to the db</h1>
    <?php
       if($db){
           echo "success";
       }elseif(isset($error)){
           echo $error;
       }
     ?>
</body>
</html>