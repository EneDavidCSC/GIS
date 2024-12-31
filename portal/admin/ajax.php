<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'delete_crime'){
	$save = $crud->delete_crime();
	if($save)
		echo $save;
}
ob_end_flush();
?>