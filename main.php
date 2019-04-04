<?php
	require('dbconfig.php');
	$key = $_POST['key'];
	if($key=='login'){
		//echo($key);
		logon($_POST['uname'], $_POST['password']);
		echo "Ok";
	}else if($key=='enter_marks'){
		//echo($_POST['subs_with_marks'][0]['sub0']);
		$reg = $_POST['regno'];
		//echo($_POST['subs_with_marks'][0]['sub0']);
		echo(enterMarks($reg, $_POST['subs_with_marks']));
	}else if($key=='pay_fees'){
		echo(payFees($_POST['regno'], $_POST['fees'], $_POST['cast']));
	}
	else if($key=='attendance'){
		echo(fetchAttn($_POST['regno']));
	}else{
		echo register($_POST);
	}
	/*function login($username, $password){	
		$res = logon($username, $password);
		if($res)
			echo "Ok";
	}*/
?>