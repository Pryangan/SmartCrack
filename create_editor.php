 <?php $cn=mysql_connect("localhost","root","") or die("Could not Connect My Sql");
mysql_select_db("smartcrack",$cn)  or die("Could connect to Database");
?>

 <?php
	if(isset($_POST['submit']))
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
				else if(file_exists("upload/".$_FILES['file']['name']))
				{
					echo $_FILES['file']['name']."Already Exist";
				}
				else if(move_uploaded_file($_FILES['file']['tmp_name'],
						"upload/".$_FILES['file']['name']))
						{
							$part = $_FILES['file']['name'];
							$type = editor;
					$sql = mysql_query("INSERT INTO mst_user(first_name,last_name,address,date,month,year,email_id,mobile_num,gender,login_id,password,image,course,type) VALUES('{$_POST['name']}','{$_POST['lname']}','{$_POST['address']}','{$_POST['date']}','{$_POST['month']}','{$_POST['year']}','{$_POST['email']}','{$_POST['phone']}','{$_POST['gender']}','{$_POST['lid']}','{$_POST['pass']}','{$part}','{$_POST['course']}','{$type}')");
					if($sql)
					{
						$lid = $_POST['lid'];
						echo ("<script language='javascript'>window.alert('Your Editor's Login ID  $lid Created Sucessfully...')
		window.location.href='admin.php' 
		</script>");

					}
					else
					{
						echo ("<script language='javascript'>window.alert('Your Editor's Login ID  $lid is not Created... Try Again') 
		</script>");
					}
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
                    .height(228);
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

      <!-- Your Page Content Here -->
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Editor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="/SmartCrack/SignUP/p.php" method="post" enctype="multipart/form-data">
                <!-- text input -->
              <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" placeholder="Enter First Name ..." name="name">
              </div>
              <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" placeholder="Enter Last Name ..." name="lname">
              </div>
              <div class="form-group">
              	<label>Address</label>
                <textarea name="address" placeholder="Address..." name="address" class="form-about-yourself form-control" id="form-about-yourself"></textarea>
               </div>
               <div class="form-group">
                   <div class="form-group">
                                            <label for="dob">Date Of Birth</label>
                                            <table><tr><td><select  class="form-control" id="sel1" name="date">
                                          <option value="">Date</option>
                                          <?php
                                            for($i=1;$i<=31;$i++){
                                          ?>
                                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
                                        </select></td>
                                            <td><select  class="form-control" id="sel2" name="month">
                                          <option value="">Month</option>
                                          <?php
                                            for($i=1;$i<=12;$i++){
                                          ?>
                                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
                                        </select></td>
                                        <td><select  class="form-control" id="sel3" name="year">
                                          <option value="">Year</option>
                                          <?php
                                            for($i=1990;$i<=2020;$i++){
                                          ?>
                                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
                                        </select></td></tr></table>
                                         </div>
                                         <div class="form-group">
                                            <label for="email">Email ID</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email ID">
                                          </div>
                                          <div class="form-group">
                                            <label for="mobile number">Mobile Number</label>
                                            <input type="text" class="form-control" id="mob" name="phone" placeholder="Mobile Number">
                 </div>                                         
               <div class="form-group">
               		<label>Gender</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="male" checked> Male</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="female"> Female</label>
			  </div>
  			  <div class="form-group">
				     <label class="sr-only" for="Login">Login Id</label>
				     <input type="text" name="lid" placeholder="Login Id..." class="form-email form-control" id="form-email">
			  </div>
              <div class="form-group">
               		<label class="sr-only" for="form-password">Password</label>
                   	<input type="password" name="pass" placeholder="Password..." class="form-password form-control" id="password">
                	
              </div> 
              <style>
 											 article, aside, figure, footer, header, hgroup, 
 											 menu, nav, section { display: block;
											  }
			  </style> 
              <div>
              <input type='file' onchange="readURL(this);" name="file" /><br/>
   										 <img id="blah" src="#" alt="your image" class="img-responsive" style="width:304px;height:228px;"/>            
              </div><p>
              <div class="form-group">
              <label>Course</label>
           <label class="checkbox-inline"><input type="radio" name="course" value="bca">BCA</label>
            <label class="checkbox-inline"><input type="radio" name="course" value="bba">BBA</label>
            <label class="checkbox-inline"><input type="radio" name="course" value="bjmc">BJMC</label>
			</div> 
              <input type="submit" align="middle" name="submit" value="Create Editor" class="btn btn-lg btn-primary active" />             
                
              </form>
            </div>
            <!-- /.box-body -->
      	
          
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
