<?php
include_once 'config.php';
if(isset($_GET['edit_id'])){
 $sql_query="SELECT * FROM child WHERE id=".$_GET['edit_id'];
 $result_set=mysql_query($sql_query);
 $fetched_row=mysql_fetch_array($result_set);
};
if(isset($_POST['btn-update'])){
 // variables for input data
 $name = $_POST['name'];
 $long_description = $_POST['long_description'];
 // sql query for update data into database
 $sql_query = "UPDATE child SET name='$name',long_description='$long_description' WHERE id=".$_GET['edit_id'];
 // sql query for update data into database
 $result = mysql_query($sql_query);
 if($result){
   echo "<script language=\"JavaScript\">\n";
   echo "alert('Record was updated.');\n";
   echo "window.location='index.php'";
   echo "</script>";
 }
};
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRUD Operations With PHP and MySql - By Cleartuts</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="body">
 <div id="content">
  <form method="post">
  <table align="center">
    <tr>
      <td><input type="text" name="name" placeholder="Name" value="<?php echo $fetched_row['name']; ?>" required /></td>
    </tr>
    <tr>
      <td><input type="text" name="long_description" placeholder="Long Description" value="<?php echo $fetched_row['long_description']; ?>" required /></td>
    </tr>
    <tr>
      <td>
        <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
      </td>
    </tr>
   </table>
   </form>
  </div>
</div>
</center>
</body>
</html>
