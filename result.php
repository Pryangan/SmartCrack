<?php 
session_start();
$cn=mysql_connect("localhost","root","") or die("Could not Connect My Sql");
mysql_select_db("smartcrack",$cn)  or die("Could connect to Database");

 $a=$_GET['id'];
	
	$test_name=mysql_query("select test_name from mst_test where test_id=$a");
	 $result_test_name=mysql_fetch_array($test_name);
	$response=mysql_query("select * from mst_question where test_id=$a");
	 $i=1;
	 $right_answer=0;
	 $wrong_answer=0;
	 $unanswered=0;
	 while($result=mysql_fetch_array($response)){ 
	       if($result['true_ans']==$_POST[$result['que_id']]){
		       $right_answer++;
		   }else if($_POST[$result['que_id']]==5){
		       $unanswered++;
		   }
		   else{
		       $wrong_answer++;
		   }
		   $i++;  
	 }
	 echo "<div id='main'>
    <div class='content'>
<table width='100%' height='300px' border='0' class='main_table'>
	<tr valign='top'><td>"; 

	 echo "<div id='answer'>";
	 echo "<h2>Hello ".$_SESSION[login]."<br> Your Result:<br>Test Name: $result_test_name[test_name]<br><br>";
	 echo " Right Answer  : ". $right_answer."</span><br>";

	 echo " Wrong Answer  : ". $wrong_answer."</span><br>";

	 echo " Unanswered Question  : ". $unanswered."</h2></span><br>";
	 echo "</div>";
	 echo "</td></tr></table>
</div>
</div>";

	 
	$insert_result=mysql_query("insert into mst_result (login,test_id,test_name,right_answer,wrong_answer,unanswered) values('$_SESSION[login]','$a','$result_test_name[test_name]','$right_answer','$wrong_answer','$unanswered')") or die("Could not perform the query");

?>