<?php 
ob_start();
$id=$_GET['id'];
include("database.php");
  if(isset($_POST['update']))
  {
  $eusername=$_POST['eusername'];
  $updated=mysql_query("UPDATE mst_subject SET sub_name='$eusername',course = '{$_POST['course']}',semester = '{$_POST['semester']}' WHERE sub_id='".$id."'")or die(mysql_error());
  		if($updated)
  		{
  		$msg="Successfully Updated!!";
  		header('Location:Subject_update&delete.php');
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
<body class="hold-transition skin-blue sidebar-mini">
	 <!-- Content Header (Page header) -->
		<!-- Main content -->
		<section class="content">
<?php 
  if(isset($_GET['id']))
  {
  $id=$_GET['id'];
  $query = "SELECT * FROM mst_subject WHERE sub_id='".$id."'";
  $getselect=mysql_query($query) or die(mysql_error());
  $profile=mysql_fetch_assoc($getselect);
  
    $username=$profile['sub_name'];
    
?>
  <form role="form" method="post" action="">
     <div class="form-group">
					  <label>Subject</label>
					  <input type="text" class="form-control" placeholder="Enter Subject ..." name="eusername" value="<?php echo $username;?>">
				  </div>
	 <div class="form-group">
					    <label>Course</label><p>
						<label class="radio-inline"><input type="radio" name="course" value="bca"<?php echo ($profile['course']=='bca')?'checked':'' ?>> BCA</label>
						<label class="radio-inline"><input type="radio" name="course" value="bba"<?php echo ($profile['course']=='bba')?'checked':'' ?>> BBA</label>
						<label class="radio-inline"><input type="radio" name="course" value="bjmc"<?php echo ($profile['course']=='bjmc')?'checked':'' ?>> BJMC</label>
				  </div>
	<div class="form-group">
					  <label>Semester</label>

					  <select class="form-control" name="semester">
						<option><?php echo $profile['semester']; ?></option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
					  </select>
					</div>
    <p>
      <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg"/>
    </p>
  </form>

<?php  } ?>
</body>
</html>
</section>
		<!-- /.content -->
 
  <!-- /.content-wrapper -->
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
