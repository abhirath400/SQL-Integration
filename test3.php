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

            echo "<h1>Registration Page</h1><br>";

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "testdb";

            $conn = mysqli_connect($servername,$username,$password,$database);
            
            if (!$conn){
                die("Sorry, we failed to connect.".mysqli_connect_error()."<br>");
            }
            else{
                // echo "Successful Connection<br>";
            }

            $name = $_POST["name"];
            $uname = $_POST["username"];
            $pass = $_POST["pass"];

            $sql = "INSERT INTO `login`(`name`,`username`,`password`) VALUES ('$name','$uname','$pass')";
            $result = mysqli_query($conn, $sql);

            if ($result){
                echo "User Registered Successfully<br>";
                echo "<h3><a href=\"test.html\">Click here to Login</a></h3>";
            }
            else{
                if (mysqli_error($conn) == "Duplicate entry '$uname' for key 'login.PRIMARY'"){

                    echo "Username already exists.<br>";
                    echo "Try with another username.<br>";
                    echo "<h3>Already Registered ?<a href=\"test.html\">Click here to Login</a></h3>";
                }
                else{
                    echo "Registration failed due to ".mysqli_error($conn)."<br>";
                }
            }

        ?>


    </center>

</body>

</html>