<?php
  ob_start();
  include("database.php");
  if(isset($_GET['id'])!="")
  {
  $delete=$_GET['id'];
  $delete=mysql_query("DELETE FROM mst_subject WHERE sub_id='$delete'");
  if($delete)
  {
      header("Location:Subject_update&delete.php");
  }
  else
  {
      echo mysql_error();
  }
  }
  ob_end_flush();
?>