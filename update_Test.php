<?php 
ob_start();
include("database.php");
if(!empty($_GET['id']))
{
  $id=$_GET['id'];
}
  if(isset($_POST['update']))
  {
  $Test_name=$_POST['Test_name'];
  $Total_question=$_POST['Total_question'];
  $updated=mysql_query("UPDATE mst_test SET test_name='$Test_name',total_que='$Total_question' WHERE test_id='".$id."'")or
   die(mysql_error());
  		if($updated)
  		{
  		$msg="Successfully Updated!!";
  		header('Location:test_update&delete.php');
  		}
	}  //update ends here
ob_end_flush();
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create Subject</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- Chat box style -->
  <link rel="stylesheet" href="css/chat_box_style.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Main content -->
    <section class="content">
<?php 
  if(isset($_GET['id']))
  {
  $id=$_GET['id'];
  $query = "SELECT * FROM mst_test WHERE test_id='".$id."'";
  $getselect=mysql_query($query) or die(mysql_error());
  $profile=mysql_fetch_assoc($getselect);
  
    	$testName=$profile['test_name'];
	$totalQuestion=$profile['total_que'];	
?>
<div class="display">
  <form action="" method="post" role="form">
     <p>
      <label for="name"  id="preinput"> Test Name : </label>
      <input type="text" class="form-control" name="Test_name" required placeholder="Enter Subject name" 
      value="<?php echo $testName; ?>" id="inputid" />
    </p>
     <p>
      <label for="name"  id="preinput"> Total Question : </label>
      <input type="text" class="form-control" name="Total_question" required placeholder="Enter Subject name" 
      value="<?php echo $totalQuestion; ?>" id="inputid" />
    </p>
    <p>
      <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg" />
    </p>
  </form>
</div>
<?php  } ?>
</section>
   
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- ChatBox -->
<script src="js/chat_box_script.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
