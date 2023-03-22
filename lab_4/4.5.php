<?php
$username = "php";
$password = "pompa";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $enteredUsername = $_POST["username"];
  $enteredPassword = $_POST["password"];

  if ($enteredUsername == $username && $enteredPassword == $password) {
    echo "Login successful!";
  } else {
    echo "Invalid username or password.";
  }
}
?>

<form method="post">
  <label>Username:</label>
  <input type="text" name="username"><br>

  <label>Password:</label>
  <input type="password" name="password"><br>

  <input type="submit" value="Log In">
</form>