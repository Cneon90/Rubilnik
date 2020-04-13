<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Авторизация в системе</title>
	
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Подключаем Bootstrap CSS -->
    <link rel="stylesheet" href="style\bootstrap.min.css" >
	<link rel="stylesheet" href="style\style.css">

	
	<link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
</head>

<body>


   <?php 
    //Проверка на статического пользователя, в будущем из БД
   if(isset($_POST['name']) && isset($_POST['pass']))
     {
           if(($_POST['name']=="admin") && ($_POST['pass'])=="admin") 
           { 
               $_SESSION['autor']=1;
               $_SESSION['name']="admin";
               $err="";
         
           } else $err = "Неверный логин или пароль!";
    
     } 
     

              //Проверка на выход
                 if(isset($_GET['out']) && $_GET['out']== "logoff")
                   {
                       $_SESSION['autor']=0; //разовтаризация 
                   }

    ?>    






<!-- vladmaxi top bar -->
<?php include_once 'top.php'; ?>

<!--/ vladmaxi top bar -->



<div class = "settings" >

<?php 

        //если не авторизован то показываем форму авторизации
       if(!isset($_SESSION['autor']) || ($_SESSION['autor']==0))
        include_once 'form.php';
        
        if(isset($_GET['num']) && isset($_SESSION['autor'])==1)
		{
			echo '<h4> Настройка устройства   </h4>';
		}
		


?>


<?php 
		          include_once 'config.php';//подключение файла кон-ции
				  $name_room="Device";
				  $mysqli = new mysqli($host, $user, $pass, $db) 
                  or die("Ошибка " . mysqli_error($mysqli));	 
				  
				  if(isset($_GET['name']))
					  
					  {
						  //  $sql = "UPDATE `device` SET `room`=078 WHERE id = 2";
						      $sql = mysqli_query( $mysqli, 'UPDATE `device` SET  `room`='.$_GET['room'].', `name`=\''.$_GET['name'].'\' WHERE id ='.$_GET['num']);
						   
					  }
				  
				  
				  
				  
				  if(isset($_GET['num']))
				  {
				  $sql = mysqli_query( $mysqli, 'SELECT * FROM `device` WHERE id ='.$_GET['num']);
				  $result = mysqli_fetch_array($sql); 
				  $power =  $result['power'];
				  $rom = mysqli_query( $mysqli, 'SELECT * FROM `room` WHERE id ='.$result['room']);
				  $result2 = mysqli_fetch_array($rom); 
				  }
						
						//echo "<h1>". $result['name']."</h1>";
				  
				  
				  
				  ?>

<div class="form-wrap format" >
    Сейчас в комнате: <?php echo  $result2['name']; ?>
    
  <form  method="GET" action="index.php" >
    
      <label for="DeviceName">Название </label>
      <input type="text" name="name" required   value="<?php echo $result['name']; ?>">
	  <label for="DeviceName" type="hidden">id </label> 
	  <input type="text" name="num" required   size="1"  value="<?php echo $_GET['num'] ?>" type="hidden">
    </div>
    
	
	  
	  
   
      <label for="rooms">Комната</label>
      <select name="room" >
      
          
		  <?php
				  $sql = mysqli_query( $mysqli, 'SELECT * FROM `room` ');
				   while ($result = mysqli_fetch_array($sql)) {
					    $x++;
						echo '<option value="'.$result['id'].'" >'.$result['name'].'</option>';
					}	
			 mysqli_close($mysqli);//Закрываем соединение с базой		
			?> 
		
		
		
      </select> 
      <div class="select-arrow"></div> 
    
    <button type="submit">Переместить</button> 
	  <a href="index.php?device&all"> Вернуться </a>
	  
	  
	  <br>
	<div class="posit">Устройство <?php 
	                 if($power==0) 
						  echo "Выключено"; 
					   else echo "Включено";
				?>
				</div>
  </form> 
</div> 
</body>
</html>
