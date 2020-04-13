<div class="col-xs-12 col-md-7 col-sm-9  col-lg-9 brd"> 

<?php
			
                  include_once 'config.php';//подключение файла кон-ции
				  $name_room="Device";
				  $mysqli = new mysqli($host, $user, $pass, $db) 
                  or die("Ошибка " . mysqli_error($mysqli));	 
				  
				   /*$sql = mysqli_query( $mysqli, 'SELECT * FROM `room` WHERE id ='.$_GET['id']);
				   $x=0;
				    
				   while ($result = mysqli_fetch_array($sql)) {
					  $name_room=$result['name'];
					  echo "<h1>".$name_room."</h1>";
					  
				   }*/
				  
				   $sql = mysqli_query( $mysqli, 'SELECT * FROM `device` WHERE room = '.$_GET['id']);
				   if(isset($_GET['all'])) 
				       {
						 echo "<h1>Все устройства</h1>";   
					     $sql = mysqli_query($mysqli, 'SELECT * FROM `device`');
						} 
				   $x=0;
				    
				   while ($result = mysqli_fetch_array($sql)) {
					    $x++;
						echo '<div class="col-xs-12 col-md-5 col-sm-3  col-lg-3 brd devices cntrt"> ';
						echo '<a href="setdev.php?num='.$x.'">'.$result['name'].'<div class="kartinkadev cntrk">  </div> </a> <div class="zagolovok"> </div>  <input type="button" onclick="power(\'on\')" value="ON"> <input type="button" onclick="power(\'off\')" value="OFF"/>  ';
						echo '</div>';
						echo '';

					}	
			 mysqli_close($mysqli);//Закрываем соединение с базой		
			?>

</div>

