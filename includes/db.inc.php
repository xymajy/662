<?php

try
{
  $pdo = new PDO('mysql:host=mysql1.cs.clemson.edu;dbname=jingyamdatabase', 'jingyam', '19910429Mjy@');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}

?>
