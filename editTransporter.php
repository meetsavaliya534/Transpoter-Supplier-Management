<html>
<body>

<?php
                require_once "dbconfig1.php";
                try{

                  if($_SERVER['REQUEST_METHOD']=="POST"){

                    $sql =" UPDATE transporter_detail SET T_name=:sname,T_mob=:mob,T_add=sadd WHERE T_ID=:id";
                    $res = $pdo->prepare($sql);
                    $res->bindParam(':id',$_REQUEST['id']);
                    $res->bindParam(':tname',$_REQUEST['t_name']);
                    $res->bindParam(':mob',$_REQUEST['t_mob']);
                    $res->bindParam(':tadd',$_REQUEST['t_add']);
                    $res->execute();

                    header("location:transporterTable.php?msg=Data Updated Successfully");
                  }
                  else{
                      $sql = " SELECT * FROM transporter_detail WHERE T_ID=:id";
                      $res = $pdo->prepare($sql);
                      $res->bindParam(':id',$_REQUEST['id']);
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
<a href="transporterTable.php"><input type="button" name="dbconfig "value="Show Data"/></a>
<form method="POST">        
        <h2> Edit Here </h2><br>
        <label for="txt_lname">transporter Name :</label>
        <input type="text" name="t_name" id="t_name" value="<?php if(isset($row['T_name'])){ echo $row['T_name'];}?>" required/><br><br>
        
        <label for="txt_pwd">transporter Mobile :</label>
        <input type="tel" name="t_mob" id="t_mob" value="<?php if(isset($row['T_mob'])){ echo $row['T_mob'];}?>" required/><br><br>

        <label for="txt_pwd">transporter Address :</label>
        <input type="text" name="t_add" id="t_add" value="<?php if(isset($row['T_add'])){ echo $row['T_add'];}?>" required/><br><br>
        <input type="submit" name="submit" value="Submit"/>
        <br><br><br>
        
</body>
</html>