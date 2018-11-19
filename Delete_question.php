<?php
  ob_start();
  include("database.php");
  if(isset($_GET['id'])!="")
  {
  $delete=$_GET['id'];
  $delete=mysql_query("DELETE FROM mst_question WHERE que_id='$delete'");
  if($delete)
  {
      header('Location:view_question.php');
  }
  else
  {
      echo mysql_error();
  }
  }
  ob_end_flush();
?>