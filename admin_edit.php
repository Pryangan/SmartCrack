<?php $cn=mysql_connect("localhost","root","") or die("Could not Connect My Sql");
mysql_select_db("smartcrack",$cn)  or die("Could connect to Database");

if(isset($_GET['status']))
{
$status1=$_GET['status'];
$select=mysql_query("select * from mst_user where user_id='$status1'");
$row=mysql_fetch_array($select);
$picture = $row['image'];
if($row['state']==1){
		$a=Activate;
}else{
	$a=Deactivate;
}
}

if(isset($_POST['savechange'])){
	$newpicture = $_FILES['file']['name'];
		if($newpicture)
		{
		if(($_FILES['file']['type'] == 'image/gif')
			|| ($_FILES['file']['type'] == 'image/jpeg')
			|| ($_FILES['file']['type'] == 'image/pjpeg')
			&& ($_FILES['file']['size'] < 200000))
			{
				if($_FILES['file']['error'] > 0)
				{
					echo "return code:". $_FILES['file']['error'];
				}
				else if(file_exists('SignUP/upload/'.$_FILES['file']['name']))
				{
					echo $_FILES['file']['name']."Already Exist";
				}
				else if(move_uploaded_file($_FILES['file']['tmp_name'],
						'SignUP/upload/'.$_FILES['file']['name']))	
						{
							unlink('SignUP/upload/'.$picture);
							$sqledit = "UPDATE mst_user SET first_name = '{$_POST['firstname']}',last_name = '{$_POST['lastname']}',password = '{$_POST['ps']}',address = '{$_POST['address']}',date = '{$_POST['date']}',month = '{$_POST['month']}',year = '{$_POST['year']}',image = '$newpicture',gender = '{$_POST['gender']}',email_id = '{$_POST['email']}',mobile_num = '{$_POST['mob']}',course = '{$_POST['dep']}' WHERE user_id='$status1'";
							
							$re = mysql_query($sqledit);
							if($re)
							{
								echo ("<script language='javascript'>
					window.alert('Save Change Successfully With Image..')
					window.location.href='admin_info.php'
					</script>");	
							}
						}
			}
			
	}
	else
			{
				$sqlnophoto ="UPDATE mst_user SET first_name = '{$_POST['firstname']}',last_name = '{$_POST['lastname']}',password = '{$_POST['ps']}',address = '{$_POST['address']}',date = '{$_POST['date']}',month = '{$_POST['month']}',year = '{$_POST['year']}',gender = '{$_POST['gender']}',email_id = '{$_POST['email']}',mobile_num = '{$_POST['mob']}',course = '{$_POST['dep']}' WHERE user_id='$status1'";
							
							$res = mysql_query($sqlnophoto);
							if($res)
							{
								echo ("<script language='javascript'>
					window.alert('Save Change Successfully..')
					window.location.href='admin_info.php'
					</script>");	
							}	
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
	<script type="text/javascript">
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(304)
                    .height(236);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
	</script>
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
   										    <tr><td>First Name</td><td><input type="text" value="<?php echo $row['first_name']; ?>" name="firstname" class="form-control" /></td><td rowspan="7"><img src="/SmartCrack/SignUP/upload/<?php echo $row['image'];?>"class="img-rounded" alt="Editor image" width="304" height="236" id="blah" class="img-responsive" alt="your image"></td></tr>
	<tr><td>Last Name</td><td><input type="text" value="<?php echo $row['last_name']; ?>" name="lastname" class="form-control"/></td></tr>
	<tr><td>Login ID</td><td><input type="text" value="<?php echo $row['login_id']; ?>" readonly="readonly" class="form-control"/></td></tr>
    <tr><td>Password</td><td><input type="text" value="<?php echo $row['password']; ?>" class="form-control" name="ps"/></td></tr>
	<tr><td>Address</td><td><textarea rows="4" cols="40" name="address" class="form-control"><?php echo $row['address']; ?></textarea></td></tr>
	<tr><td>Date Of Birth</td><td><select id="sel1" name="date">
                                          <option value="<?php echo $row['date']; ?>"><?php echo $row['date']; ?></option>
                                          <?php
                                            for($i=1;$i<=31;$i++){
                                          ?>
                                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
                                        </select>
                                            <select id="sel2" name="month">
                                          <option value="<?php echo $row['month']; ?>"><?php echo $row['month']; ?></option>
                                          <?php
                                            for($i=1;$i<=12;$i++){
                                          ?>
                                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
                                        </select>
                                        <select id="sel3" name="year">
                                          <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
                                          <?php
                                            for($i=1990;$i<=2020;$i++){
                                          ?>
                                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
                                        </select></td></tr>
    <tr><td>Image</td><td><input type='file' onchange="readURL(this);" name="file" /></td></tr>                                    
	<tr><td>Gender</td><td><input type="radio" name="gender" value="male"<?php echo ($row['gender']=='male')?'checked':'' ?> />Male
    <input type="radio" name="gender" value="female"<?php echo ($row['gender']=='female')?'checked':'' ?> />Female</td></tr>
	<tr><td>Email ID</td><td><input type="email" name="email" value="<?php echo $row['email_id']; ?>" class="form-control"/></td></tr>
	<tr><td>Phone No.</td><td><input type="text" name="mob" value="<?php echo $row['mobile_num']; ?>" class="form-control"/></td></tr>
	<tr><td>Department</td><td><input type="radio" name="dep" value="bca"<?php echo ($row['course']=='bca')?'checked':'' ?> />BCA
    <input type="radio" name="dep" value="bba"<?php echo ($row['course']=='bba')?'checked':'' ?> />BBA
    <input type="radio" name="dep" value="bjmc"<?php echo ($row['course']=='bjmc')?'checked':'' ?> />BJMC</td></tr>
	<tr><td>Role</td><td><input type="text" value="<?php echo $row['type']; ?>" readonly class="form-control"/></td></tr>
    <tr><td colspan="2" align="center"><input type="submit" name="savechange" value="Save Change" class="btn btn-primary btn-lg"/>
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
