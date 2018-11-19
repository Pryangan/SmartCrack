 <?php require('database.php');
 session_start();?>
 <?php 
		
			$sql = mysql_query("select * from mst_user where user_id=59");
			$row = mysql_fetch_array($sql);
			echo $row['login_id'];
?>			