
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>home page</title>
  </head>
  <body>
    <p>home page</p>
        <p>
          <input type="submit" name="action" value="edit">
		<?php 
      //session_start();
      echo "<br>" . "here is home page" . "<br>";
      //echo "haha " . $_SESSION["userid"] . "<br>";
      
      echo "end" . "<br>";
		?>	
        <input type="submit" name="action" value="cancle">
        <input type="submit" name="action" value="change">
        </p>
  </body>
</html>
