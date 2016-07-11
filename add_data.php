<?php
include_once 'config.php';
//set variable $a to name of the DB we are connected to so its obvious on the main page
$a = mysql_result(mysql_query("SELECT DATABASE();"),0);
//start if statement for the save to DB button
if(isset($_POST['btn-save'])){
  // variables for input data
  $name = $_POST['name'];
  $long_description = $_POST['long_description'];
  // sql query for inserting data into database
  $sql_query = "INSERT INTO child(name,long_description) VALUES('$name','$long_description')";
  $result = mysql_query($sql_query);
  if($result){
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Record Added.');\n";
    echo "window.location='index.php'";
    echo "</script>";
  }
}

?>

<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SSB BART GROUP - CRUD PHP MySQL APACHE App</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>Add Data to BD: <?php echo $a?></label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post"  >
    <table align="center">
    <tr>
    <td align="center"><a href="index.php">Back to Index</a></td>
    </tr>
    <tr>
    <td><input type="text" name="name" placeholder="Name" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="long_description" placeholder="Long Description" required /></td>
    </tr>
    <tr>
    <td><button id="myForm" type="submit" name="btn-save"><strong>SAVE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
<script>
  document.getElementById('myForm').addEventListener('click',function{
    console.log("hi");
  })
</script>
</body>
