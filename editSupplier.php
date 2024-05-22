<html>
<body>
<?php
                require_once "dbconfig1.php";
                try{
                  if($_SERVER['REQUEST_METHOD']=="POST"){

                    $sql = "UPDATE supplier_detail SET S_name=:sname,S_mob=:smob,S_add=:sadd WHERE S_ID=:s_id";
                    $res = $pdo->prepare($sql);
                    $res->bindParam(':sname',$_REQUEST['s_name']);
                    $res->bindParam(':smob',$_REQUEST['s_mob']);
                    $res->bindParam(':sadd',$_REQUEST['s_add']);
                    $res->bindParam(':s_id',$_REQUEST['id']);
                    $res->execute();
                    header("location:supplierTable.php");
                  }
                  else{
                      $sql = "SELECT * FROM supplier_detail WHERE S_ID=:s_id";
                      $res = $pdo->prepare($sql);
                      $res->bindParam(':s_id',$_REQUEST['id']);
                      $res->execute();
                      if ($res->rowCount()==1)
                      {
                          $row=$res->fetch();
                      }
                    }
                  
              }
                catch(PDOException $e1){
                }
        ?>

<br><br>
<a href="supplierTable.php"><input type="button" name="dbconfig"value="Show Data"/></a>
<form method="POST">        
        <h2> Edit Here </h2><br>
        <label for="txt_lname">Supplier Name :</label>
        <input type="text" name="s_name" id="s_name" value="<?php if(isset($row['S_name'])){ echo $row['S_name'];}?>" required/><br><br>
        
        <label for="txt_pwd">Supplier Mobile :</label>
        <input type="number" name="s_mob" id="s_mob" value="<?php if(isset($row['S_mob'])){ echo $row['S_mob'];}?>" required/><br><br>

        <label for="txt_pwd">Supplier Address :</label>
        <input type="text" name="s_add" id="s_add" value="<?php if(isset($row['S_add'])){ echo $row['S_add'];}?>" required/><br><br>
        
        <a href="dbconfig1.php"> 
        <input type="submit" name="submit" value="Submit"/>
        </a>
        <br><br><br>
        
</body>
</html>