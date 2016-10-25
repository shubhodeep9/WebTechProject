<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
  include 'connection.php';
  $title = $_POST['title'];
  $text = $_POST['text'];
  $user = $_COOKIE['user'];
  $conn->query("INSERT INTO entries (title,text,user) VALUES ('$title','$text','$user')");
  header('Location: index.php');
} else {
?>
<!doctype html>
<title>Web Blog</title>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="page">
  <h1>Web Blog</h1>
  <div class="metanav">
    <a href="logout.php">Logout</a>
  </div>
  <form action="" method="post" class="add-entry">
    <dl>
      <dt>Title:
      <dd><input type="text" size="30" name="title">
      <dt>Text:
      <dd><textarea name="text" rows="5" cols="40"></textarea>
      <dd><input type="submit" value="Share">
    </dl>
  </form>
  <ul class="entries">
  <?php
  include 'connection.php';
  $entries = $conn->query("SELECT * FROM entries ORDER BY id DESC");
  while($r = $entries->fetch_assoc()){
  ?>
    <li><h2><?php echo $r['title']." by ".$r['user']; ?></h2><?php echo nl2br($r['text']); ?></li>
  <?php
  }
  if($entries->num_rows == 0){
  ?>
    <li><em>Unbelievable.  No entries here so far</em></li>
  <?php
  }
  ?>
  </ul>
</div>
<?php
}
?>