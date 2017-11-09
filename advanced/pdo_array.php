<?php
 try{
     require_once('../include/pdo_connect.php');
     $sql = "SELECT name, meaning FROM names";
     $result = $db->query($sql);
     $names = $result->fetchAll(PDO::FETCH_KEY_PAIR);
    
    
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
    <title>Pdo array</title>
</head>
<body>
    <pre>
        <?php print_r($names) ?>
    </pre>
    
</body>
</html>