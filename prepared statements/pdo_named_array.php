<?php
   if(isset($_POST['search'])){
    try{
        require_once('../include/pdo_connect.php');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT name, yearmade, price FROM cars WHERE name LIKE :name
                       ORDER BY price';
        $stmt = $db->prepare($sql);
        $value = Array(':name'=>'%'.$_POST['search_key'].'%');
        $stmt->execute($value);
        $values = $stmt->fetchAll();

      }catch(Exception $e){
          $error = $e->getMessage(); 
      }
      
  
      if(isset($error)){
          echo $error;
      }
   }
   
    // $numrows = $result->rowCount();
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>named</title>
 </head>
 <body>
     <form action="pdo_named_array.php" method="post">
      <input type="text" name="search_key" id="" placeholder="search">
      <input type="submit" value="Search" name="search">
     </form>
     <pre>
      <?php
      if(isset($_POST['search'])){
      print_r($values); 
      }
      ?>
     </pre>
 </body>
 </html>
