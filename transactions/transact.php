<?php
    try{
      require_once('../include/pdo_connect.php');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $payer = "aleks";
        $payee = "annet";
        $amount = 10000;
        $debit = 'UPDATE savings SET amount = amount - :amount WHERE name = :payer';
        $credit = 'UPDATE savings SET amount = amount + :amount WHERE name = :payee';
        
        $pay = $db->prepare($debit);
        $pay->bindParam(':amount', $amount);
        $pay->bindParam(':payer', $payer);

        $recieve = $db->prepare($credit);
        $recieve->bindParam(':amount', $amount);
        $recieve->bindParam(':payee', $payee);

        //transaction
        $db->beginTransaction();
        $pay->execute();
        if(!$pay->rowCount()){
            $db->rollBack();
            $error = "transaction failed: Could not update $payer's balance";
        }else{
            $recieve->execute();
            if(!$recieve->rowCount()){
                $db->rollBack();
                $error = "transaction failed: Could not update $payee's balance";
            }else{
                $db->commit();

            }
        }
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
    <title>Transaction</title>
</head>
<body>
<h1>Paying money</h1>
    <?php
       $sql = 'SELECT name, amount FROM savings';
       $result = $db->query($sql);
       if(isset($error)){
           echo $error;
       }
     ?>
     <table>
         <tr>
             <th>Name</th>
             <th>Amount</th>
         </tr>
         <?php while($row = $result->fetch()){
             echo "<tr>
                     <td>{$row['name']}</td>
                     <td>$".$row['amount']."</td>
             </tr>";
         } ?>
     </table>

</body>
</html>