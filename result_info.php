<?php
	session_start();
$cn=mysql_connect("localhost","root","") or die("Could not Connect My Sql");
mysql_select_db("smartcrack",$cn)  or die("Could connect to Database");	?>
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
$result = mysql_query("SELECT * FROM mst_result");
$num_rows = mysql_num_rows($result);
	echo "<table class='table table-hover'>
    <tr bgcolor='#2980b9'>
	<th>Login</th>
	<th>Test Name</th>
	<th>Right Answer</th>
	<th>Wrong Answer</th>
	<th>Unanswered</th>
	<th>Total result".$num_rows."</th>
	</tr>";
	
	while($record=mysql_fetch_array($result)){
		 $id=$record['sl_no'];
		 $x=$x+1;
		 if($x%2==0){
			 $col="#F5BCA9";
		 }else{
			 $col="#E1F5A9";
		 }
		echo "<tr bgcolor=".$col.">";
		echo "<td>" .  $record['login']. " </td>";
		echo "<td>" . $record['test_name']. "</td>";
		echo "<td>" . $record['right_answer']. "</td>";
		echo "<td>" . $record['wrong_answer']. "</td>";
		echo "<td>" . $record['unanswered']. "</td>";
		?>
		<td height="40"> <a href="result_delete.php?id=<?php echo $id; ?>" onClick="return confirm('Are you sure you wish to delete this Record?');" id="delete" class="ui-state-default ui-corner-all">
            <span class="btn btn-danger btn-lg">Delete</span></a></td>
			<?php
		echo "</tr>";
	}
	echo "</table>";
	mysql_close();
?>

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