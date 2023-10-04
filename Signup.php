<?php


include('database.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);

    $query = mysqli_query($connect, "SELECT email FROM Databasetable WHERE email = '$email'");

    if (mysqli_num_rows($query) > 0) {
        echo "User already exists";
    } 

    
    else {
        $sql = mysqli_query($connect, "INSERT INTO Databasetable (name, email, password, confirmpassword) VALUES ('$name', '$email', '$password', '$confirmpassword')");
        if ($sql) {
            
            header("location: Login.php");
        
        }
    }
}
?>

<html>
<body>
    <h1>PROFILE</h1>
    <form action="Signup.php" method="post">


        <h1>name:</h1><input type="text" name="name" required><br>
        <h1>email:</h1><input type="email" name="email" required><br>
        <h1>password:</h1><input type="password" name="password" required><br>
        <h1>confirmpassword:</h1><input type="password" name="confirmpassword" required>
        <input type="submit" name="submit">
    </form>
</body>
</html>
