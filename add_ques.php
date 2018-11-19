 <?php require('database.php');
 session_start();?>
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
<form method="post" action="try_jquery_ui1.php" role="form">
    <h2>Select Test Name </h2>
<select name="testid" class="form-group">
<?php
$rs=mysql_query("Select * from mst_test order by test_name");
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$testid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
      </select></div>
   	<h2>Enter Question</h2>
    <div><textarea name="addque"class="form-group"></textarea></div>
	<h2>Enter Answer1 </h2>
    <div><input name="ans1" type="text" class="form-group"></div>
    <h2>Enter Answer2 </h2>
    <div><input name="ans2" type="text" class="form-group"></div>
    <h2>Enter Answer3 </h2>
    <div><input name="ans3" type="text" class="form-group"></div>
    <h2>Enter Answer4</h2>
    <div><input name="ans4" type="text" class="form-group"></div>
    <h2>Enter True Answer </h2>
    <div><input name="anstrue" type="text" pattern="[1-4]*" placeholder="1 to 4" class="form-group"></div>
	</div>
    <button type="submit" class="btn btn-primary btn-lg">Add</button>
    </form>
    
    </section>
    <!-- /.content -->

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

