<html>
<body>
<?php
        require_once "dbconfig1.php";
                try{
                    $sql ="DELETE FROM supplier_detail WHERE S_ID=:id";
                    $res = $pdo->prepare($sql);
                    $res->bindParam(':id',$_REQUEST['id']);
                    $res->execute();
                    header("location:supplierTable.php?msg=Data Deleted Successfully");
              }
                catch(PDOException $e1){
                }
        ?>
</body>
</html>