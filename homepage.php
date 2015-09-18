
<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	$UID = $_SESSION["userid"];
	//echo $UID . "<br>";
    include 'showsomething.php';
	try
	{
	$sql = 'SELECT * FROM usrinfo WHERE UID = :UID';
	$s = $pdo->prepare($sql);
	$s->bindValue(':UID',$UID);	
	$s->execute();
	}
	catch (PDOException $e){
	$error = 'Error select.';
	header("Location:http://localhost/error.html.php");
	exit(); 
	}
	//echo "hfuffff" . "<br>";
	$row = $s->fetch();
	//var_dump($row);
	//UID 	fname 	lname 	address
	echo " Name is : " . $row['fname'] . " " . $row['lname'] . "<br>";
	echo " Address is : " . $row['address'] . "<br>"; 

if(isset($_POST['action']) and $_POST['action'] == 'cancle'){
  	
    //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
	try
	{

	$sql = 'SELECT TID FROM workinfo WHERE UID = :UID';
	$s = $pdo->prepare($sql);
	$s->bindValue(':UID',$UID);	
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





?>	
