<?php
	$mysql = mysqli_connect("localhost","root","Ransom", "srmgs");	//hi main file ha database connect kela itun srmgs he naav
	function logon($username, $password){
		global $mysql;
		$result = mysqli_query($mysql, "select * from register where reg_id='".$username."' and password='".$password."'");  //hiyhun query call keli ni databse madhe store zala
		if(mysqli_num_rows($result)>0)
			return true;
		else
			return false;
	}
	function enterMarks($reg, $arr){
		global $mysql;
		for($i=0;$i<count($arr);$i++){
			$sub = $arr[$i]['sub0'];
			$sub_m = $arr[$i]['sub0_m'];
			mysqli_num_rows(mysqli_query($mysql, "insert into marks values('$reg', '$sub', '$sub_m')"));
		}
	}
	function payFees($reg, $fees, $cast){
		global $mysql;
		return mysqli_num_rows(mysqli_query($mysql, "insert into fees values('$reg', $fees, '$cast')"));
	}
	function fetchAttn($regno){
		global $mysql;
		return mysqli_fetch_array(mysqli_query($mysql, "select overall_attendance from attendance where reg_no='$regno'"))[0];
	}
	function register($var){
		global $mysql;
		return mysqli_query($mysql, "insert into register values('".$var['regno']."','".$var['name']."',".$var['rollno'].",'".$var['address']."','".$var['dob']."','".$var['email']."','".$var['branch']."',".$var['contact'].",'".$var['pasw']."','".$var['gender']."')");
	}
?>