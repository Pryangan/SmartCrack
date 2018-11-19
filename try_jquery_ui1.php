<?php
include("database.php");
	extract($_POST);
mysql_query("insert into mst_question(test_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')",$cn) or die(mysql_error());
echo ("<script language='javascript'>window.alert('Question Added Successfully.')
		window.location.href='add_ques.php' 
		</script>");

unset($_POST);
?>	