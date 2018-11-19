<?php
session_start();
require("database.php");
if(isset($_POST['submit'])){
extract($_POST);
$rs=mysql_query("select * from mst_subject where sub_name='$subname'");
if (mysql_num_rows($rs)>0)
{	echo ("<script language='javascript'>
					window.alert('Subject is Already Exists')
					window.location.href='create_subject.php'
					</script>");
	exit;
}

mysql_query("insert into mst_subject(sub_name,course,semester) values ('$subname','$course','$semester')") or die(mysql_error());
echo ("<script language='javascript'>
					window.alert('Subject   \"$subname \" Added Successfully.')
					window.location.href='create_subject.php'
					</script>");
$submit="";
}
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

		  <!-- general form elements disabled -->
			  <div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Course</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<form role="form" method="post" action="">
				   <div class="form-group">
						<label class="radio-inline"><input type="radio" name="course" value="bca" checked> BCA</label>
						<label class="radio-inline"><input type="radio" name="course" value="bba"> BBA</label>
						<label class="radio-inline"><input type="radio" name="course" value="bjmc"> BJMC</label>
				  </div>
				  
				   <!-- select -->
					<div class="form-group">
					  <label>Semester</label>

					  <select class="form-control" name="semester">
						<option> --- Enter Semester --- </option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
					  </select>
					</div>
					<!-- text input -->
				  <div class="form-group">
					  <label>Subject</label>
					  <input type="text" class="form-control" placeholder="Enter Subject ..." name="subname">
				  </div>
					
				  </div> 
				  <input type="submit" align="middle" name="submit" value="Create Subject" class="btn btn-lg btn-primary active" />             
					
				  </form>
				</div>
				
		
		

		</section>
		<!-- /.content -->
  </div>
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
