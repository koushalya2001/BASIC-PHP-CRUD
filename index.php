<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
function ValEmail() 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value))
  { return true;
  }
    alert("PLEASE ENTER A VALID ADDRESS!")
   return false;
}

</script>
<style>
input:invalid {
    border-color: red;
}
input,
input:valid {
    border-color: #ccc;
}
</style>
</head>
<body>
<div class="row justify-content-center">
<form  name="form" autocomplete="on" method="post" enctype="application/x-www-form-urlencoded"  action="check.php" >

<center>

<div class="form-group">
<h2>NAME:</h2>
<input type="text" placeholder="first name" name="fn" value=""class="form-control" required\><br>
</div>

<div class="form-group">
<h2>EMAIL ID:</h2>
<input type="email" placeholder="abc@gmail.com" name="email" onblur="ValEmail()" class="form-control"  value="" required/><br>
</div>

<div class="form-group">
<h2>PHONE NUMBER</h2>
<input type="tel" id="phone" name="phone"pattern="[+][9-9][1-1][0-9]{10}"   title="MOBILE NUMBER SHOULD CONFORM TO FORMAT. e.g. +916379089071(NO SPACE BETWEEN +91 AND YOUR NUMBER" class="form-control" value="" required \><br>
<small>Format:+91(your 10 digit mobile number)</small><br>
<div/>

<center><button type="submit" value="add" name="add"  class="btn btn-primary" >ADD</button></center>

</center>

</div>
</form>
</body>
</html>