<!DOCTYPE html>

<?php
  include_once 'config.php';
  //set variable $a to name of the DB we are connected to so its obvious on the main page
  $a = mysql_result(mysql_query("SELECT DATABASE();"),0);
  //delete functionality
  if(isset($_GET['delete_id'])){
   $sql_query="DELETE FROM child WHERE id=".$_GET['delete_id'];
   mysql_query($sql_query);
  }
?>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>SSB BART GROUP - CRUD PHP MySQL APACHE App</title>
  <link rel="stylesheet" href="style.css" type="text/css" />
  <script type="text/javascript">
    function edt_id(id){
     if(confirm('Sure to edit ?')){
      window.location.href='edit_data.php?edit_id='+id;
     }
    }
    function delete_id(id){
     if(confirm('Sure to Delete ?')){
      window.location.href='index.php?delete_id='+id;
     }
    }
  </script>
</head>
<body>
  <center>
    <div id="header">
     <div id="content">
        <label>Connected to: <?php echo $a?> database</label>
        </div>
    </div>
    <div id="body">
      <div id="content">
        <table align="center">
          <tr>
            <th colspan="6"><a href="add_data.php">Add data!</a></th>
          </tr>
          <th>ID</th>
          <th>Parent ID</th>
          <th>Name</th>
          <th>Long Description</th>
          <th colspan="2"></th>
        </tr>
        <?php
         $sql_query="SELECT * FROM child";
         $result_set=mysql_query($sql_query);
         while($row=mysql_fetch_row($result_set)) { ?>
          <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')">Edit</a></td>
            <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')">Delete</a></td>
          </tr>
        <?php
         }
         ?>
       </table>
     </div>
   </div>
 </center>
</body>
</html>
