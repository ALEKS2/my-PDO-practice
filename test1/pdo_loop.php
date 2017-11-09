<?php
    try{
      require_once('../include/pdo_connect.php');
    }catch(Exception $e){
        $error = $e->getMessage(); 
    }
    $sql = 'SELECT name, meaning, gender FROM names
                   ORDER BY name';
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
     <table>
        <tr>
            <th>NAME</th>
            <th>Meaning</th>
            <th>Gender</th>
        </tr>
        <?php foreach($db->query($sql) as $row){ ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['meaning'] ?></td>
            <td><?php echo $row['gender'] ?></td>
        </tr>
        <?php } ?>
     </table>
     
</body>
</html>