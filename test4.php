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
        $database = "testdb";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Sorry, we failed to connect." . mysqli_connect_error() . "<br>");
        } else {
            // echo "Successful Connection<br>";
        }

        $uname = $_POST["username"];
        $pass = $_POST["pass"];

        $sql = "SELECT * FROM `login` WHERE `username` = '$uname'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        // echo var_dump($row);
        // echo $uname." ".$pass." ".$row['password'];

        if ($result) {
            if ($row) {

                if ($pass == $row['password']) {
                    echo "Welcome , " . $uname . "<br>";
                    session_start();
                    if (isset($_SESSION['visits'])) {

                        $_SESSION['visits'] = $_SESSION['visits'] + 1;
                        if ($_SESSION['visits'] > 20) {

                            session_destroy();
                            exit();
                        }
                    } else {

                        $_SESSION['visits'] = 1;
                    }

                    echo "<center><h3>Total visits=" . $_SESSION['visits'] . "</h3></center>";
                    
                    if ($uname == 'abhi001') {
                        if (isset($_COOKIE['time'])) {
                            $now = time();
                            $past = $_COOKIE['time'];
                            $diff = $now - $past;
                            if ($diff > 20) {
                                echo "You are very special.";
                            } else {
                                $left = 20 - $diff;
                                echo "Please wait " . $left . " seconds for a special message.";
                            }
                        } else {
                            setcookie('time', time(), time() + 120);
                            echo "Better luck next time.";
                        }
                    }
                } else {
                    echo "Wrong Credentials. Try again.";
                }
            } else {
                echo "User not registered. Please Register first.<br>";
                echo "<h3><a href=\"test1.html\">Click here to Register</a></h3>";
            }
        } else {
            // if (mysqli_error($conn) == "Duplicate entry '$uname' for key 'login.PRIMARY'"){

            //     echo "Username already exists.<br>";
            // }
            // else{
            echo "Login failed due to " . mysqli_error($conn) . "<br>";
            // }
        }

        ?>


    </center>

</body>

</html>