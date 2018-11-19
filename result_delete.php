<?php
  ob_start();
  include("database.php");
  if(isset($_GET['id'])!="")
  {
  $delete=$_GET['id'];
  $delete=mysql_query("DELETE FROM mst_result WHERE sl_no='$delete'");
  if($delete)
  {
      header('Location:result_info.php');
  }
  else
  {
      echo mysql_error();
  }
  }
  ob_end_flush();
?>