<?php

session_start();

include('database.php');

      if (isset($_SESSION['email'])) {

    header("location: Welcome.php");
    exit();
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); 

    
            $sql = "SELECT email, password FROM Databasetable WHERE email = '$email' AND password = '$password'";

         $result = mysqli_query($connect, $sql);

    if (!$result) {
        echo "error";
    }

    if (mysqli_num_rows($result) > 0) {


        $_SESSION['email'] = $email;
        header('location: Welcome.php');
        exit();
    }
else {
        echo "Invalid email or password.";
    }
}
?>

<html>
<body>
    
        <h1>LOGIN_PAGE</h1>
    
    <center>
        <form action="Login.php" method="post">
            Email: <input type="text" name="email" required><br><br>

            Password: <input type="password" name="password" required><br><br>
            
            <input type="submit" value="Login" name="submit">
        </form>
    </center>
</body>
</html>
