<?php
require "includes/dbconnect.php";
$showError = NULL;
$acc = NULL;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mail = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // Check whether this username exists
    $existSql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username Already Exists";
    }
    else{
        if(($password == $cpassword)){
            $sql = "INSERT INTO users ( username, password, date) VALUES ('$mail', '$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showError = "<div><p style='color: green;'>Account Created Successfully..!</p></div>";
                $acc = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    
    <link rel="stylesheet" href="styles.css" />
    <style>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 90px auto;
            padding: 20px;
            align-items: center;
            justify-content:center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius:10%;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 90%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #dc3545;
            margin-top: 10px;
        }
        #b{
            margin-left:15px;
        }
    </style>

</head>
<body>
    <header>
      <div class="logo">HOMEHUNT</div>
      <div class="nav">
        <a href="logina.php">Admin Login</a>
        <a href="login.php">User Login</a>
      </div>
    </header>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="cpassword" required>
            <input type="submit" value="Sign Up" id="b">
        </form>
        <div class="error-message">
            <?php
            if(isset($showError))
            {
                echo $showError;
            }
            if($acc == true)
            {
                echo '<a href="login.php" style="color:green;">login now</a>';
            }
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>