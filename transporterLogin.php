<!DOCTYPE html>
<html lang="en">
<?php
    
    require_once "dbconfig1.php";
    try{
        $sql = "SELECT * FROM t_login WHERE t_uname=:uname AND t_pwd=:pwd";
        $res = $pdo->prepare($sql);
        $res->bindParam(':uname',$_REQUEST['uname']);
        $res->bindParam(':pwd',$_REQUEST['pass']);
        $res->execute();
        if($res->rowCount()==1)
        {
            header("location:transporterTable.php");
        }
        else
        {
            echo "Invalid Username or Password";
        }
        }
    catch(PDOException $e1){
        }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            background: #bbd8e5;
        }

        .truck {
            width: 1200px;
            height: 600px;
            position: absolute;
            top: 25%;
            left: 10%;
            animation: truckanime 2s linear 1;
        }

        @keyframes truckanime {
            0% {
                left: 100%;
            }

            100% {
                left: 10%;
            }
        }

        .container {
            width: 1200px;
            height: 600px;
        }

        .log {
            width: 1200px;
            height: 600px;
            position: absolute;
            left: 15%;
            top: -18%;
            border-radius: 24px;
            padding: 48px;
            font-family: 'Sora', sans-serif;
            animation: loganime 3.5s linear 1;
        }
        @keyframes loganime {
            0% {
                top: -85%;
            }

            100% {
                top: -18%;
            }
        }
        .detail{
            position: absolute;
            top: 50%;
            left: 35%;
        }
        h1{
            font-size: 35px;
            text-align: center;
            margin-bottom: 10px;
        }
        p{
            font-size: 25px;
            margin-bottom: 10px;
        }
        input{
            font-size: 25px;
            width: 225px;
            border-radius: 10px;
        }
        .uname{
            margin-left: 15px;
        }
        .pass{
            margin-left: 30px;
        }
        .btn{
            width: 150px;
            margin: 0px 120px;
        }
    </style>
</head>

<body>
    <img class="truck" src="images/truck.png" alt="truck">
    <div class="log">
    <form method="get">
        <img class="container" src="images/container1.png" alt="container">
        <div class="detail">
            <h1>Login</h1>
        <br>
        <p>Username :<input type="text" name="uname" id="uname" class="uname" required></p><br>
        <p>Password :<input type="password" name="pass" id="pass" class="pass" required></p><br>
        <a href="supplierTable.php">
        <input type="submit" value="Submit" class="btn">
    </form>
        </a>
        </div>
    </div>
</body>
</html>