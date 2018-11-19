<?php  
	require('database.php');
?>
<form action="" method="post">
<table align="center" border="1" width="285">
<tr><td>Course Name:</td><td><input type="text" name="t1" id="t1" /></td></tr>
<tr><td>No. of year:</td><td><input type="text" name="t2" id="t2" /></td></tr>
<tr><td>No. of semester:</td><td><input type="text" name="t3" id="t3" /></td></tr>
<tr><td>No. of subject:</td><td><input type="text" name="t4" id="t4" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="newcourse" id="newcourse" /></td></tr>
</table>
</form>
<?php 
	if(isset($_POST['newcourse'])){
		$Course_Name = $_POST['t1'];
		$no_of_yr = $_POST['t2'];
		$no_of_sem = $_POST['t3'];
		$no_of_subject = $_POST['t4'];
		
		
		mysql_query("CREATE TABLE ". $Course_Name ." (
	  id INT AUTO_INCREMENT,
	  ".
	  for($i=1;$i<=$no_of_sem;$i++){
			 'sem'.$i.'CHAR,';
		}." 
	  PRIMARY KEY(id)
	)") Or die(mysql_error());
	mysql_close ();	
	}
?>