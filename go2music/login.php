<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go2Music</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Antique&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Road+Rage&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="loginstyles.css">

</head>

<body>

    <marquee direction="right" width="100%" class="slogan">The quieter you become the more you are able to hear!!!</marquee>
    <div class="logo">
        <img src="logo.png" height="100px" width="100px">
    </div>
    <div class="container">
        <div class="form">
            <h3>Create Account</h3>
            <form name="create_form" action="login.php" method="POST">
                <div class="insideForm">
                    <label for="firstname" target="_blak">First Name: </label>
                    <input type="text" name="firstname" id="firstname" maxlength="15" placeholder="First Name" required><br>

                    <label for="lastname" target="_blak">Last Name: </label>
                    <input type="text" name="lastname" id="lastname" maxlength="15" placeholder="Last Name" required><br>


                    <label for="password" target="_blak">Password: </label>
                    <input type="password" name="password" id="password" placeholder="Set password" required><br>

                    <label for="username" target="_blak">Username: </label>
                    <input type="text" name="username1" id="username1" placeholder="Enter username" required><br>

                    <label for="email" target="_blak">Mail ID: </label>
                    <input type="email" name="email2" id="email2" placeholder="Email" required><br>

                    <label for="contact" target="_blak">Contact Number: </label>
                    <input type="number" name="contact" maxlength="10" id="contact" placeholder="Contact Number"><br>

                    <br>
                </div>
                <button id="btn1" name="submit1" type="submit">Submit</button>
                <button id="btn2">Reset</button>
            </form>
        </div>
        <div class="form1">
            <h3>Sign in</h3>
            <form name="login_form" action="login.php" method="POST">
                <div class="insideForm1">
                    <label for="username" target="_blak">Username: </label>
                    <input type="text" name="username2" id="username2" placeholder="Enter Username"><br>

                    <label for="password1" target="_blak">Password: </label>
                    <input type="password" name="password2" id="password2" placeholder="Enter password"><br>
                    <button id="btn3" name="submit2" type="submit">Sign in</button>

                </div>
            </form>
        </div>
    </div>
    <footer>
        <div class="navbar">
            <ul>
                <li><a href="about.html">About Us</a></li>
            </ul>
        </div>
    </footer>

    <footer class="copyright">© 2021</footer>
</body>

<?php

$servername = "localhost:3306";
$uname = "root";
$pwd = "";
$dbname = "go2music";


// Creating connection
$conn = new mysqli($servername, $uname, $pwd, $dbname);
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);



if (isset($_POST['submit1'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $password1 = $_POST['password'];
    $username1 = $_POST['username1'];
    $email = $_POST['email2'];
    $pnum = $_POST['contact'];

    $sql = "INSERT INTO user VALUES ('$fname', '$lname', '$password1', '$username1', '$email', '$pnum')";
    if ($conn->query($sql) != TRUE)
        print "Error: " . $sql . "<br>" . $conn->error . "<br>";
    else
        print "Profile Created <br>";
}

if (isset($_POST['submit2'])) {
    $username2 = $_POST['username2'];
    $password2 = $_POST['password2'];


    $sql = "SELECT p FROM user WHERE uname = '$username2'";

    $result = $conn->query($sql);


    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_row();

        if ($password2 == $row[0]) {
            echo '<script type="text/JavaScript"> 
                    window.location.href = "go2music/index.html";
                  </script>';
        } else {
            echo '<script type="text/JavaScript"> 
                    window.location.href = "fail_pwd.html";
                  </script>';
        }
    } else
        echo '<script type="text/JavaScript"> 
        window.location.href = "fail_user.html";
        </script>';

    $result->free_result();
}

?>

</html>