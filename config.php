<?php
global $MYSQLI, $DATABASE_NAME;

$MYSQLI = mysqli_connect("127.0.0.1", "root", ""); //no db selected

if(mysqli_connect_errno()) {
	die("ERROR: Database Connection to <u>localhost</u> has Failed! [". mysqli_connect_error() ."]");
}else{
 	if (!mysqli_set_charset($MYSQLI, "utf8")) {} //try set UTF8

 	mysqli_select_db($MYSQLI, "missdb");
	$sql = "SELECT database() AS strDB";
    $rst = mysqli_query($MYSQLI, $sql);
    $DATABASE_NAME = mysqli_fetch_object($rst)->strDB; 
    echo "THE DATABASE WAS CONNECTED AS $DATABASE_NAME"; 	
}

if($_POST) unset($_GET);

//util
	function query($sql, $Debug=0)
	{
		global $MYSQLI, $DATABASE_NAME;

		if($Debug) vd($sql);
		
		$rst = mysqli_query($MYSQLI, $sql);

		if($rst === false){
			pr(mysqli_error($MYSQLI));
		}

		if($Debug) pr($rst);

		return $rst;
	}
//
	function fetch($rst)
	{
		global $MYSQLI, $DATABASE_NAME;
		if($row = mysqli_fetch_object($rst)){		
			return $row;
		}
		else{
			return false;
		}

	}

//geting the comments count from the db
	function fetch_count($rst)
	{

		if($row = mysqli_fetch_row($rst1)){		
			return $row;
		}
		else{
			return false;
		}

	}

//
	function fetch_array($rst)
	{
		
		if($row = mysqli_fetch_array($rst)){
			return $row;
		}
		else{
			return false;
		}

	}

//	CLEAN DATA BEFORE BEING USED
	function clean($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


	function vd($value){
		echo "<br/>";
		var_dump($value);
	}

	function pr($value)
	{
		echo "<PRE>";
		print_r($value);
		echo "</PRE>";
	}


?>