<html>
<body>
<?php
        require_once "dbconfig1.php";
                try{
                    $sql ="DELETE FROM transporter_detail WHERE T_ID=:id";
                    $res = $pdo->prepare($sql);
                    $res->bindParam(':id',$_REQUEST['id']);
                    $res->execute();
                    header("location: transporterTable.php?msg=Data Deleted Successfully");
              }
                catch(PDOException $e1){
                }
        ?>
</body>
</html>