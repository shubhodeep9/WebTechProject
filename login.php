<?php
if(isset($_COOKIE['user']))
  header('Location: index.php');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  include 'connection.php';
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $exists = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
  if($exists->num_rows === 1){
    setcookie('user',$username,time()+36000000);
    header('Location: index.php');
  }else{
    echo "Wrong Username or Password";
  }
} else {
?>

<!doctype html>
<title>Web Blog</title>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="page">
  <h1>Web Blog</h1>
  <div class="metanav">
    <a href="register.php">Register</a>
  </div>
  <h2>Log In</h2>
  <form action="login.php" method="post">
    <dl>
      <dt>Username:
      <dd><input type="text" name="username">
      <dt>Password:
      <dd><input type="password" name="password">
      <dd><input type="submit" value="Log In">
    </dl>
  </form>
</div>

<?php
}
?>