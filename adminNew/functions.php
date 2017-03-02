<?php
function validEmail($email){
	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
	if(preg_match($regex, $email)){
		return true;
	}
	return false;
}

function showMessage($message){
	if($message != ""){
		session_start();
		$_SESSION['gs_reg_status'] = $message;
		header("location: messagePage.php");
	}
}
?>