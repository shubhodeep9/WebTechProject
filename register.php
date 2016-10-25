<?php
if(isset($_COOKIE['user']))
  header('Location: index.php');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  include 'connection.php';
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $exists = $conn->query("SELECT * FROM users WHERE username = '$username'");
  if($exists->num_rows === 1)
    echo "User exists, try another username";
  else{
    $conn->query("INSERT INTO users (username,password) VALUES ('$username','$password')");
    header('Location: login.php');
  }
} else {
?>

<!doctype html>
<title>Web Blog</title>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="page">
  <h1>Web Blog</h1>
  <div class="metanav">
    <a href="login.php">log in</a>
  </div>
  <h2>Register</h2>
  <form action="register.php" method="post">
    <dl>
      <dt>Username:
      <dd><input type="text" name="username">
      <dt>Password:
      <dd><input type="password" name="password">
      <dd><input type="submit" value="Register">
    </dl>
  </form>
</div>

<?php
}
?>