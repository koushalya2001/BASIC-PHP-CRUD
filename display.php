<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
ini_set('display_errors','1');
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','digitaldemo');
// require_once('check.php');
  $mysqli=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME) or die($mysqli->error);
$name='  ';
 $phone='  ';
$update=false;
?>

<?php
if(isset($_SESSION['message'])):
?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php
  echo $_SESSION['message'];
  unset($_SESSION['message']);
?>
</div>
<?php endif; ?>

<div class="container">
<?php
$result=$mysqli->query("SELECT * FROM detailsofuserss;") or die($mysqli->error);
?>


<div class="row justify-content-center">
<center>
<table class="table" BORDER="1">
  <thead>
 <tr>
  <th>NAME</th>
 <th>EMAIL</th>
<th>PHONE NUMBER</th>
<th colspan="2">OPTIONS</th>
</tr>
</thead>
<?php

  while($row=$result->fetch_assoc()): ?>
  <tr>
  <td><?php echo $row['name'];?></td>
  <td><?php echo $row['email'];?></td>
 <td><?php echo $row['phone'];?></td>
 <td><a href="display.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a>
<a href="display.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">DELETE</a></td>
<?php endwhile; ?>
</tr>
</table><br>
</center>
<form action="index.php" method="get">
<center><input type="submit" value="CREATE" name="submit" class="btn btn-primary"/></center>
</form>
</div>
</div>
<?php
  
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$mysqli->query("DELETE FROM detailsofuserss WHERE id=$id") or die($mysqli->error);
$_SESSION['message']="RECORD HAS BEEN deleted!";
  $_SESSION['msg_type']="DANGER";
header('location: display.php');
}
 
if(isset($_GET['edit'])){
$id=$_GET['edit'];
$update=true;
$result=$mysqli->query("SELECT * FROM detailsofuserss where id=$id") or die($mysqli->error);
$update=true;
$row=$result->fetch_array();
$name=$row['name'];
$phone=$row['phone'];
$email=$row['email'];
?>
<form  name="form" autocomplete="on" method="post" enctype="application/x-www-form-urlencoded"  action="check.php" >

<center>

<div class="form-group">
<h2>NAME:</h2>
<input type="text" placeholder="first name" name="fn" value="<?php if($update== true):  echo $name;  endif;?>"class="form-control" required\><br>
</div>

<div class="form-group">
<h2>EMAIL ID:</h2>
<input type="email" placeholder="abc@gmail.com" name="email" onblur="ValEmail()" class="form-control"  value="<?php if($update== true):  echo $email;  endif;?>" required/><br>
</div>

<div class="form-group">
<h2>PHONE NUMBER</h2>
<input type="tel" id="phone" name="phone"pattern="[+][9-9][1-1][0-9]{10}"   title="MOBILE NUMBER SHOULD CONFORM TO FORMAT. e.g. +916379089071(NO SPACE BETWEEN +91 AND YOUR NUMBER" class="form-control" value="<?php if($update== true): echo $phone; endif;?>" required \><br>
<small>Format:+91(your 10 digit mobile number)</small><br>
<div/>

<center><button type="submit" value="add" name="edit"  class="btn btn-primary" >edit</button></center>

</center>

</div>
</form>
<?php
}
?>
</body>
</html>