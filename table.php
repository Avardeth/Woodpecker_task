<html>
    <head>
        <title>Registered users table</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div> Logged in as 
            <?php 
                session_start();
                $name = $_SESSION['Name'];
                echo $name;
            ?>
        </div>
        <div class="logout">
            <a href="index.php" class="col"> Logout </a>
            <a href="register.php" class="col"> Register </a>
        </div>
        <div class="container">
            <div class="row">
            <div class="col"><?php //include("register.php"); ?></div>
            <div class="col">
            <table class="table table-bordered table-striped">
                <thead class="table-head">
                    <tr>
                        <td>Name</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Last login</td>
                        <td>Joined</td>
                    </tr>
                </thead>
                <tbody class=""> 
                    <?php
                        require("config.php");

                        $sql = "SELECT us.name as Name, us.username, us.email, lo.last_login, us.joined FROM users as us 
                        inner join login as lo on lo.id=us.id ORDER BY name";

                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>
                    <tr>
                        <td><?php echo $row["Name"];?></td>
                        <td><?php echo $row["username"];?></td>
                        <td><?php echo $row["email"];?></td>
                        <td><?php echo $row["last_login"];?></td>
                        <td><?php echo $row["joined"];?></td>
                    </tr>
                    <?php
                        }
                    }
                    
                    ?>
                </tbody>
            </table>
            </div>
            </div>
        </div>
    </body>
</html>