<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include '../includes/config.php';
    
    $this->db = $conn;
	}
    function delete_crime(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM tblcrimes where id = ".$id);
		if($delete)
			return 1;
	}
}