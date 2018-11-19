<?php 
session_start();
$cn=mysql_connect("localhost","root","") or die("Could not Connect My Sql");
mysql_select_db("smartcrack",$cn)  or die("Could connect to Database");
 $a=$_GET['status'];
?>
<link rel="stylesheet" href="/OnlineXam/css/jquery-ui-1.10.4.custom.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/OnlineXam/css/div.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
	.box{
	position:fixed;
	top:25px;
	right:0px;	
	background:red;
	height:40px;
	width:300px;
}

	</style>
    <script type="text/javascript">
	function countdown(secs,elem){
		var element = document.getElementById(elem);
		element.innerHTML = "Remaining time "+secs+" seconds";
		if(secs<1){
			clearTimeout(timer);
			alert("exam finish");
			document.f1.btn_submit.click();
			element.innerHTML+='<a href="#">click here now</a>';	
		}
		secs--;
		var timer = setTimeout('countdown('+secs+',"'+elem+'")',1000); 
	}
</script>
<script type="text/javascript" src="/OnlineXam/jquery/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/OnlineXam/jquery/jquery-ui-1.10.4.custom.js"></script>

<table width="100%" border="0" class="table"> 
    <tr>
    <td>
    
    <?php
	$b="select * from mst_question where test_id=$a";
	$test_name="select * from mst_test where test_id=$a";
	$result_test=mysql_query($test_name);
	$row_1=mysql_fetch_array($result_test);
 $result=mysql_query($b);
 echo "<h1>Test Name: <strong>".$row_1['test_name']."</strong></h1> <div id='status' class='box'></div>";
 $X=0;
 echo "<form method='post' action='result.php?id=".$a."' role='form'  name='f1'>";
 while($row=mysql_fetch_array($result)){ 
 $X=$X+1;
 ?>
 	<div id="question_<?php echo $row['que_id'];?>" class='questions'>
<h2 id="question_<?php echo $row['que_id'];?>"><?php echo $X.".".$row['que_desc'];?></h2>
<div class='align'>
<input type="radio" value="1" id='radio1_<?php echo $row['que_id'];?>' name='<?php echo $row['que_id'];?>'>
<label id='ans1_<?php echo $row['que_id'];?>' for='1'><?php echo $row['ans1'];?></label>
<br/>
<input type="radio" value="2" id='radio2_<?php echo $row['que_id'];?>' name='<?php echo $row['que_id'];?>'>
<label id='ans2_<?php echo $row['que_id'];?>' for='1'><?php echo $row['ans2'];?></label>
<br/>
<input type="radio" value="3" id='radio3_<?php echo $row['que_id'];?>' name='<?php echo $row['que_id'];?>'>
<label id='ans3_<?php echo $row['que_id'];?>' for='1'><?php echo $row['ans3'];?></label>
<br/>
<input type="radio" value="4" id='radio4_<?php echo $row['que_id'];?>' name='<?php echo $row['que_id'];?>'>
<label id='ans4_<?php echo $row['que_id'];?>' for='1'><?php echo $row['ans4'];?></label>
<input type="radio" checked='checked' value="5" style='display:none' id='radio4_<?php echo $row['que_id'];?>' name='<?php echo $row['que_id'];?>'>
<br/>

<script type="text/javascript">
$(document).ready(function() {
    $('#downup<?php echo $row['que_id'];?>').click(function(){
        $('#<?php echo $row['que_id'];?>').slideToggle(200);
	});
});
</script>
<input type="button" value="Workspace" id="downup<?php echo $row['que_id'];?>" class="btn btn-default btn-medium"/><br/>
		<textarea id="<?php echo $row['que_id'];?>" style="display:none" cols="100" rows="6"></textarea>	
</div>

 <?php
 } 
 ?>
 <br/>
 <div align="center">
<input type="submit" id='next<?php echo $row['que_id'];?>' value='Submit Test!' class='btn btn-primary btn-lg' name="btn_submit" id="btn_submit" />
</div>
</div>
</form>
<script type="text/javascript">countdown(10,"status");</script>
</td>
</tr>
</table>
