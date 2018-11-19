<?php
if(isset($_POST['submit'])){
	$msg = 'Name: ' .$_POST['name'] ."\n"
			.'Email: ' .$_POST['email'] ."\n"
			.'Comment: ' .$_POST['message'];
			mail('pryangan.chowdhury@gmail.com',$_POST['subject'],$msg); 
			header('location:index.php');
}else{
	header('location:index.php');
	exit(0);
}
?>