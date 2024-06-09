<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f9f9f9;
}

.login-container {
  background-color: #fff;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  width: 400px;
  text-align: center;
  border-radius:10%;
}

h2 {
  color: #333;
  font-weight: 500;
}

.input-group {
  margin-bottom: 20px;
  text-align: left;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
  color: #666;
  font-size: 14px;
}

.input-group input {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ddd;
  transition: border-color 0.3s ease;
}

.input-group input:focus {
  outline: none;
  border-color: #007bff;
}

button {
  width: 100%;
  padding: 12px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #0056b3;
}

.bottom-text {
  margin-top: 20px;
  color: #666;
}

.bottom-text a {
  color: #007bff;
  text-decoration: none;
}

.bottom-text a:hover {
  text-decoration: underline;
}
#b{
    margin-left:10px;
}
</style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form id="login-form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
      <div class="input-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" id="b">Login</button>
    </form>
    <div class="bottom-text">
      Don't have an account? <a href="signupadmin.php">Sign up</a>
    </div>
  </div>


  <?php
    require "includes/dbconnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM adminn WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: admin.php"); 
    } else {
        echo "Invalid username or password";
    }
}

mysqli_close($conn);
?>

</body>
</html>