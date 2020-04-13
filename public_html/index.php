<?php session_start(); 
      include_once 'head.php'; 
      echo "<body>";
      include_once 'autor.php'; 
      include_once 'top.php'; 
	  
       
        //если не авторизован то показываем форму авторизации
		if(!isset($_SESSION['autor']) || ($_SESSION['autor']==0))
        include_once 'form.php';
        
        //иначе показываем кнопки 
        if(isset($_SESSION['autor']) &&($_SESSION['autor']==1))
		{
			include_once 'menu.php';
			
			if(isset($_GET['rooms']))//если в ссылке room то открываем страничку с комнатами 
				include_once 'button.php';
				
		    if(isset($_GET['device'])) //если в ссылке device то открываем устройства 
				include_once 'room.php';
				
			if(isset($_GET['sdevice'])) //если в ссылке device то открываем устройства 
				include_once 'sroom.php';	
			
			 if((isset($_GET['setdevice'])) || (isset($_GET['name'])) ) //если в ссылке device то открываем устройства 
				include_once 'setdev.php';	
		    
		}

	

?>


</body>
</html>
