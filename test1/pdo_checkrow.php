<?php
    try{
      require_once('../include/pdo_connect.php');
    }catch(Exception $e){
        $error = $e->getMessage(); 
    }
    $count = $db->query('SELECT COUNT(*) FROM names');
    $numrows = $count->fetchColumn();
    if($numrows){
        $sql = 'SELECT name, meaning, gender FROM names WHERE name="kit"
        ORDER BY name';
         $result = $db->query($sql);
    }
    
   
    // $numrows = $result->rowCount();
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
       echo "number of rows affected: ".$numrows;
     ?>
     <?php $row = $result->fetch();
     if(!$row){
         echo "none";
     }else{?>
     <table>
        <tr>
            <th>NAME</th>
            <th>Meaning</th>
            <th>Gender</th>
        </tr>
        <?php do{ ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['meaning'] ?></td>
            <td><?php echo $row['gender'] ?></td>
        </tr>
        <?php }while($row = $result->fetch()) ?>
     </table>
        <?php } ?>
     
</body>
</html>