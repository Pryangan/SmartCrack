<?php
include("database.php");
$course=$_GET['course'];
	 $year=$_GET['year'];
if(isset($_GET['status']))
{
$status1=$_GET['status'];
$select=mysql_query("select * from mst_user where user_id='$status1'");
while($row=mysql_fetch_object($select))
{
$status_var=$row->state;
if($status_var=='0')
{
$status_state=1;
}
else
{
$status_state='0';
}
$update=mysql_query("update mst_user set state='$status_state' where user_id='$status1' ");
if($update)
{	if($status_var==0)
{
echo "<h1>User Activate</h1>";
}else{
	echo "<h1>User Deactivate</h1>";
}
}
else
{
echo mysql_error();
}
}
?>
<?php
}
?>