<?php 
session_start();
$cn=mysql_connect("localhost","root","") or die("Could not Connect My Sql");
mysql_select_db("smartcrack",$cn)  or die("Could connect to Database");
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
    	<?php
$x=0;
$select=mysql_query("select * from mst_user where type like 'editor'");
$num_rows = mysql_num_rows($select);
echo "
<table class='table table-hover'>
    <tr bgcolor='#2980b9'>
	<th>Sl no.</th>
	<th>Editor Id</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Login Id</th>
	<th>Email Id</th>
	<th>Phone</th>
	<th>gender</th>
	<th>Department</th>
	<th>Status</th>
	<th>Total Editor:" . $num_rows. "</th>
	</tr>";

while($row=mysql_fetch_array($select))
{
		$x=$x+1;
		 if($x%2==0){
			 $col="#F5BCA9";
		 }else{
			 $col="#E1F5A9";
		 }
		 
	$id=$row['user_id'];
$login=$row['login_id'];
$firstname=$row['first_name'];
$lastname=$row['last_name'];
$email=$row['email_id'];
$phone=$row['mobile_num'];
$gender=$row['gender'];
$dep=$row['type'];
$status=$row['state'];
?>
<tr bgcolor="<?php echo $col;?>"><td><?php echo $x?> </td>
<td><?php echo $id?> </td>
<td><?php echo $firstname?> </td>
<td><?php echo $lastname?> </td>
<td><?php echo $login?> </td>
<td><?php echo $email?> </td>
<td><?php echo $phone?> </td>
<td><?php echo $gender?> </td>
<td><?php echo $dep?> </td>
<td height="40">
<?php
if(($status)=='0')
{
?>
<a href="/SmartCrack/Action_Editor.php?status=<?php echo $id;?>" 
  onclick="return confirm('Activate <?php echo $firstname;?>');" id="delete" class="btn btn-warning"> Deactivate </a>
<?php
}
if(($status)=='1')
{
?>
<a href="/SmartCrack/Action_Editor.php?status=<?php echo $id;?>"
 onclick="return confirm('De-activate <?php echo $firstname;?>');" id="edit" class="btn btn-success"> Activate</a>
<?php
}
?>
<td align="center"><a href="/SmartCrack/view_editor.php?status=<?php echo $id;?>" class="btn btn-info" role="button" target="f2"> 
<i class="fa fa-folder-o"</i>&nbsp;View</a></td>
</td>
<?php }?>
 
</tr></table>

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
	

