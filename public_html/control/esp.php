<?php
//
 include_once '..\config.php';//подключение файла кон-ции
 $mysqli = new mysqli($host, $user, $pass, $db) 
 or die("Ошибка " . mysqli_error($mysqli));	 
   




 if(isset($_GET['power']))
 {
		if( $_GET['power'] == 'on')
			$polosh = 1;

		if( $_GET['power'] == 'off')
		$polosh = 0;			
	   $sql = mysqli_query( $mysqli, 'UPDATE `device` SET `power`='.$polosh.' WHERE id ='.$_GET['number']);
	   if($sql) //Ксли запрос успешен, отправляем положение 
	     echo $_GET['power'];
		 else echo "bad query";

 }
 
  if(isset($_GET['device']))
  { 
        
	   $sql = mysqli_query($mysqli, 'SELECT * FROM `device`');
	   
	  echo "{";
	    while ($result = mysqli_fetch_array($sql)) {
		  
         	 echo '"'.$result['alias'].'"'.":".'"'.$result['power'].'",';
		}
  echo "end}";
	  //echo '{"reley1":"1","reley2":"0","reley3":"1","reley4":"0"} end';
  }



?>
