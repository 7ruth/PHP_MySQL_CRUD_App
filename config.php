<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = 'Vershitel';
$db_name = 'ssb_bart_group';

$conn= mysql_connect($db_hostname, $db_username, $db_password, $db_name);

if(!$conn)
{
  echo "Unable to connect".mysql_error($conn);
  die;
} else {
  mysql_select_db($db_name);
  $s = "Connected to database: ";
  // print $s . $a;
}
?>
