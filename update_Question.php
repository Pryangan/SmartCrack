<?php 
ob_start();
include("database.php");
if(!empty($_GET['id']))
{
  $id=$_GET['id'];
}
  if(isset($_POST['update']))
  {
  $question=$_POST['eusername'];
  $answer_1=$_POST['answer_1'];
  $answer_2=$_POST['answer_2'];
  $answer_3=$_POST['answer_3'];
  $answer_4=$_POST['answer_4'];
  $true_answer=$_POST['true_answer'];
  $updated=mysql_query("UPDATE mst_question SET que_desc='$question',ans1='$answer_1',ans2='$answer_2',
  ans3='$answer_3',ans4='$answer_4',true_ans='$true_answer' WHERE que_id='".$id."'")or die(mysql_error());
  		if($updated)
  		{
  		echo "<script>window.alert('Successfully Updated!!')</script>";
  		header('Location:view_question.php');
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
    <section class="content"><?php 
  if(isset($_GET['id']))
  {
  $id=$_GET['id'];
  $query = "SELECT * FROM mst_question WHERE que_id='".$id."'";
  $getselect=mysql_query($query) or die(mysql_error());
  $profile=mysql_fetch_assoc($getselect);
  
    $question=$profile['que_desc'];
	$answer1=$profile['ans1'];
	$answer2=$profile['ans2'];
	$answer3=$profile['ans3'];
	$answer4=$profile['ans4'];
	$true_ans=$profile['true_ans'];
    
?>
<div class="display">
  <form action="" method="post" role="form">
    <div class="form-group">
      <label for="name"> Question : </label>
      <textarea rows="2" cols="40 "name="eusername" class="form-group" required placeholder="Enter Subject name" id="inputid"><?php echo $question; ?></textarea>
    </div>
     <p>
      <label for="name"> Answer 1 : </label>
      <input type="text" name="answer_1" required placeholder="Enter Subject name" 
      value="<?php echo $answer1; ?>" id="inputid" />
    </p>
     <p>
      <label for="name"> Answer 2 : </label>
      <input type="text" name="answer_2" required placeholder="Enter Subject name" 
      value="<?php echo $answer2; ?>" id="inputid" />
    </p>
     <p>
      <label for="name"> Answer 3 : </label>
      <input type="text" name="answer_3" required placeholder="Enter Subject name" 
      value="<?php echo $answer3; ?>" id="inputid" />
    </p>
     <p>
      <label for="name"> Answer 4 : </label>
      <input type="text" name="answer_4" required placeholder="Enter Subject name" 
      value="<?php echo $answer4; ?>" id="inputid" />
    </p>
     <p>
      <label for="name"  id="preinput"> True Answer : </label>
      <input type="text" name="true_answer" required placeholder="Enter Subject name" 
      value="<?php echo $true_ans; ?>" id="inputid" />
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
