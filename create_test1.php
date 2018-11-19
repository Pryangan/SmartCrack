<?php
session_start();
require("database.php");
if(isset($_POST['submit'])){
extract($_POST);
mysql_query("insert into mst_test(sub_id,test_name,total_que) values ('$subid','$testname','$totque')",$cn) or die(mysql_error());
echo ("<script language='javascript'>
					window.alert('Test \"$testname\" Added Successfully.')
					window.location.href='create_test.php'
					</script>");
unset($_POST);
}
?>