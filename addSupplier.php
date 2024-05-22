<html>
<body>
        <?php
            require_once "dbconfig1.php";
            try{
                $sql = "INSERT INTO supplier_detail (S_ID, S_name, S_mob, S_add) VALUES (:id, :sname, :mob, :sadd)";
                $statement = $pdo->prepare($sql);
                $statement->bindParam(':id', $_REQUEST['s_id']);
                $statement->bindParam(':sname', $_REQUEST['s_name']);
                $statement->bindParam(':mob', $_REQUEST['s_mob']);
                $statement->bindParam(':sadd', $_REQUEST['s_add']);
                if($statement->execute())
                {
                    echo "Data Inserted Successfully";
                    header('Location: supplierTable.php');
                }
                }
                catch(PDOException $e1){
                }
        ?>

    <!-- HTML -->

        <br><br>
        <a href="supplierTable.php"><input type="button" name="dbconfig "value="Show Data"/></a>
        <form method="get">        
        <h2> Insert Here </h2><br>
        <label for="txt_fname">Supplier Id :</label>
        <input type="number" name="s_id" id="s_id" required/><br><br>
        
        <label for="txt_lname">Supplier Name :</label>
        <input type="text" name="s_name" id="s_name" required/><br><br>
        
        <label for="txt_pwd">Supplier Mobile :</label>
        <input type="tel" name="s_mob" id="s_mob" required/><br><br>

        <label for="txt_pwd">Supplier Address :</label>
        <input type="text" name="s_add" id="s_add" required/><br><br>

        <a href="supplierTable.php">  
        <input type="submit" name="submit" value="Submit"/>
        </a>
        <br><br><br>
</body>
</html>