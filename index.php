<?php
session_start();
//setcookie("userid",NULL,time()-3600,"/");
//$_SESSION["userid"]=0;
unset($_SESSION["userid"]);
unset($_SESSION["useName"]);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

//try
//{

//  $sql = 'SELECT * FROM info';
//  $result = $pdo->query($sql);

//}
//catch (PDOException $e)
//{
//  $error = 'Error fetching info: ' . $e->getMessage();
//  include 'error.html.php';
//  exit();
//}

//while ($row = $result->fetch())
//{
//  $infos[] = $row,,['name'];
//}
include 'login.html.php';

if(isset($_POST['action']) and $_POST['action'] == 'Signin'){
  	
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	try
	{
	/*$sql = 'INSERT INTO info SET
		name = :name,
		age = :age';
	$s = $pdo->prepare($sql);
	$s->bindValue(':name',$_POST['my_login_name']);
	$s->bindValue(':age',$_POST['my_login2_name']);	
	$s->execute();*/
	$sql = 'SELECT UID FROM pswinfo WHERE usrname = :usrname AND psw = :psw';
	$s = $pdo->prepare($sql);
	$s->bindValue(':usrname',$_POST['login_name']);	
	$s->bindValue(':psw',$_POST['login_psw']);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location:http://localhost/error.html.php");
	exit(); 
	}
	$row = $s->fetch();

	//echo $row['UID'];

	if($row['UID']){
		$_SESSION["userid"] = $row['UID'];
		//header("Location:http://localhost/showsomething.php");
		header("Location:http://localhost/homepage.php");
	}else{

		header("Location:http://localhost/index.php");
	}
}

//include 'login.html.php';

?>