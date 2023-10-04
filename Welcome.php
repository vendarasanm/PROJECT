<?php
session_start();





if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header('location:Signup.php');
}


?>

<html>
    <body>
        <h1><?php echo ($_SESSION['email']) ;?></h1>
        <form action="Welcome.php" method="get">
        <input type="submit" name="logout" value="logout">
</form>
</body>
</html>