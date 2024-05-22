<html>
<body>
        <?php
            require_once "dbconfig1.php";
            try{
                $sql = "INSERT INTO transporter_detail (T_ID, T_name, T_mob, T_add) VALUES (:id, :tname, :mob, :tadd)";
                $statement = $pdo->prepare($sql);
                $statement->bindParam(':id', $_REQUEST['t_id']);
                $statement->bindParam(':tname', $_REQUEST['t_name']);
                $statement->bindParam(':mob', $_REQUEST['t_mob']);
                $statement->bindParam(':tadd', $_REQUEST['t_add']);
                if($statement->execute())
                {
                    echo "Data Inserted Successfully";
                    header('Location: transporterTable.php');
                }
                }
                catch(PDOException $e1){
                }
        ?>

    <!-- HTML -->

        <br><br>
        <a href="transporterTable.php"><input type="button" name="dbconfig "value="Show Data"/></a>
        <form method="get">        
        <h2> Insert Here </h2><br>
        <label for="txt_fname">Supplier Id :</label>
        <input type="number" name="t_id" id="t_id" required/><br><br>
        
        <label for="txt_lname">Supplier Name :</label>
        <input type="text" name="t_name" id="t_name" required/><br><br>
        
        <label for="txt_pwd">Supplier Mobile :</label>
        <input type="tel" name="t_mob" id="t_mob" required/><br><br>

        <label for="txt_pwd">Supplier Address :</label>
        <input type="text" name="t_add" id="t_add" required/><br><br>

        <a href="transporterTable.php">  
        <input type="submit" name="submit" value="Submit"/>
        </a>
        <br><br><br>
</body>
</html>