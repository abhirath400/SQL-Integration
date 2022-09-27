<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>

    <center>

        <?php

            echo "<h1>Login Page</h1><br>";

            $servername = "localhost";
            $username = "root";
            $password = "";

            $conn = mysqli_connect($servername,$username,$password);
            
            if (!$conn){
                die("Sorry, we failed to connect.".mysqli_connect_error()."<br>");
            }
            else{
                echo "Successful Connection<br>";
            }

            $sql = "CREATE DATABASE testdb";
            $result = mysqli_query($conn, $sql);

            if ($result){
                echo "Database Successfully Created<br>";
            }
            else{
                echo "Database Creation failed due to ".mysqli_error($conn)."<br>";
            }

        ?>


    </center>

</body>

</html>