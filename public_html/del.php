<?php
      include_once 'config.php';
	  $mysqli = new mysqli($host, $user, $pass, $db) 
      or die("Ошибка " . mysqli_error($mysqli));	 
				  
      $sql = mysqli_query( $mysqli, 'DELETE FROM `room` WHERE `id`='.$_GET['id']);
	     mysqli_close($mysqli);//Закрываем соединение с базой
      echo "delete ok";
	
?>