<?php $cn=mysql_connect("localhost","root","") or die("Could not Connect My Sql");
mysql_select_db("smartcrack",$cn)  or die("Could connect to Database");

if(isset($_GET['status']))
{
$status1=$_GET['status'];
$select=mysql_query("select * from mst_user where user_id='$status1'");
$row=mysql_fetch_array($select);
if($row['state']==1){
		$a=Activate;
}else{
	$a=Deactivate;
}
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
  <title>Create Question</title>
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
    <!-- Main content -->
    <section class="content">
	<form role="form" action="" method="post" enctype="multipart/form-data">
		<div class="table-responsive">
  <table class="table">
    <tr><td>First Name</td><td><?php echo $row['first_name']; ?></td><td rowspan="7"><img src="/SmartCrack/SignUP/upload/<?php echo $row['image'];?>"class="img-rounded" alt="<?php echo $row['first_name']; ?>'s image" width="304" height="236"></td></tr>
	<tr><td>Last Name</td><td><?php echo $row['last_name']; ?></td></tr>
	<tr><td>Login ID</td><td><?php echo $row['login_id']; ?></td></tr>
	<tr><td>Address</td><td><?php echo $row['address']; ?></td></tr>
	<tr><td>Date Of Birth</td><td><?php echo $row['date']; ?>/<?php echo $row['month']; ?>/<?php echo $row['year']; ?></td></tr>
	<tr><td>Gender</td><td><?php echo $row['gender']; ?></td></tr>
	<tr><td>Email ID</td><td><?php echo $row['email_id']; ?></td></tr>
	<tr><td>Phone No.</td><td><?php echo $row['mobile_num']; ?></td></tr>
	<tr><td>Department</td><td><?php echo $row['course']; ?></td></tr>
	<tr><td>Role</td><td><?php echo $row['type']; ?></td></tr>
	<tr><td>Status</td><td><?php echo $a; ?></td></tr>
    </table>
</div>
	</form>
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
