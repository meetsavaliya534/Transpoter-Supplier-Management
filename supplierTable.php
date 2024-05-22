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
                                <th>S_ID</th>
                                <th>Name</th>
                                <th>Mobile NO.</th>
                                <th>Address</th>
                            </tr>
                        </thead>
        
                        <tbody>
                        <a href="addSupplier.php"><input type="button" name="Table "value="ADD DATA"/></a>
                            <?php
                            try{
                                require_once "dbconfig1.php";
                                echo "<br><br>";                
                                $stmt = $pdo->prepare("SELECT * FROM supplier_detail");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    ?>
                                        <tr>
                                        <td>
                                            <?php echo $user['S_ID']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['S_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['S_mob']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['S_add']; ?>
                                        </td>
                                        <td>
                                        <a href="editSupplier.php?id=<?php echo $user['S_ID']; ?>">
                                            <button class='btn'>EDIT</button>
                                        </a?>
                                        </td>
                                        <td>
                                        <a href="deleteSupplier.php?id=<?php echo $user['S_ID']; ?>" onclick="return confirm('Are you sure to delete ?');">
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