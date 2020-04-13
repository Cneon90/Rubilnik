<?php

    include_once 'config.php';
				$mysqli = new mysqli($host, $user, $pass, $db)
	              or die("Ошибка " . mysqli_error($mysqli));	 
				  
				   $sql = mysqli_query( $mysqli, 'SELECT * FROM `room`');
				   $x=0;
				   
				   while ($result = mysqli_fetch_array($sql)) {
			  
					$x++;//считаем кол-во записей(комнат)
					
					$name_room=$result['name']; 
					//$dlina=iconv_strlen($name_room);//узнаем длинну
					$name_room = mb_substr($name_room,0,$symbNameRoomShow,'UTF-8');

					$id = $result['id'];
					
					//while ($x++<66)
					//{

						echo '<a href="index.php?sdevice&id='.$id.'">	<div class="col-xs-12 col-md-5 col-sm-3  col-lg-3 brd room cntrt"> ';
						echo '<div class="kartinka cntrk"> '.$x.' </div> <div class="zagolovok"> '.$name_room.' | <a href="#" onclick=\'delete_room('.$id.')\'> Удалить </a> </div> ';
						echo '</div>';
						echo '</a>';

					}	

 mysqli_close($mysqli);//Закрываем соединение с базой
?>
