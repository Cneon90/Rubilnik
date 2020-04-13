<?php
      include_once 'config.php';
   	  $mysqli = new mysqli($host, $user, $pass, $db) 
      or die("Ошибка " . mysqli_error($mysqli));	 
				  
	  $sql = mysqli_query( $mysqli, 'SELECT * FROM `room` WHERE id='.$_GET['id']);
	 
	  while ($result = mysqli_fetch_array($sql)) 
	               {
      					echo $result['name'];
				   }
        mysqli_close($mysqli);//Закрываем соединение с базой				   

?>