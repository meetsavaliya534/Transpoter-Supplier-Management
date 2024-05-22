<html>
    <body>
        <?php
        if(isset($_REQUEST['msg'])){
            ?>
            <h3><?php echo $_REQUEST['msg']; ?></h3>
            <?php
        }
        ?>
        <table border="2px solid">
                        <thead>
                            <tr>
                                <th>T_ID</th>
                                <th>Name</th>
                                <th>Mobile NO.</th>
                                <th>Address</th>
                            </tr>
                        </thead>
        
                        <tbody>
                        <a href="addtransporter.php"><input type="button" name="Table "value="ADD DATA"/></a>
                            <?php
                            try{
                                require_once "dbconfig1.php";
                                echo "<br><br>";                
                                $stmt = $pdo->prepare("SELECT * FROM transporter_detail");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    ?>
                                        <tr>
                                        <td>
                                            <?php echo $user['T_ID']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['T_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['T_mob']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['T_add']; ?>
                                        </td>
                                        <td>
                                        <a href="editTransporter.php?id=<?php echo $user['T_ID']; ?>">
                                            <button class='btn'>EDIT</button>
                                        </a?>
                                        </td>
                                        <td>
                                        <a href="deleteTransporter.php?id=<?php echo $user['T_ID']; ?>" onclick="return confirm('Are you sure to delete ?');">
                                            <button class='btn'>DELETE</button>
                                        </a?>
                                        </td>
                                        </tr>
                                    <?php
                                }
                            }
                            catch(PDOException $e1){
                            }
                    ?>
            </table>
    </body>
</html>