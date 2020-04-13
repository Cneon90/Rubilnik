<?php
          include_once 'config.php';
		  
		  function my_mb_ucfirst($str) {//функция для превращения первого симпола в заглавный
				$fc = mb_strtoupper(mb_substr($str, 0, 1));
				return $fc.mb_substr($str, 1);
			}
		  
		  if(iconv_strlen($_GET['name'],'UTF-8') > $symbNameRoom ) //Проверяем длину имени создаваемой комнаты
		  {
			  echo 1;// выкидываем 1 если длинна больше
			  return;//дальше не продолжаем
		  }
		  
		   if(iconv_strlen($_GET['name'],'UTF-8') == 0 ) //Проверяем длину имени создаваемой комнаты
		  {
			  echo 2;// выкидываем 2 если пустая строка
			  return;//дальше не продолжаем
		  }

		   $nameroom=strip_tags($_GET['name']);//убираем возможные html теги
		   echo $nameroom;
		    echo "<hr>";
		   $nameroom=trim($nameroom); //Удаляет пробелы (или другие символы) из начала и конца строки
		    echo $nameroom;
			echo "<hr>";
		   $nameroom=mb_strtolower($nameroom,'UTF-8'); ; //Преобразуем строку в нижний регистр
		    echo $nameroom;
			echo "<hr>";
		   $nameroom=my_mb_ucfirst($nameroom);//Преобразует в верхний регистр первый символ каждого слова в строке
                   echo $nameroom;   
echo "<hr>";				   
		  
		  $mysqli = new mysqli($host, $user, $pass, $db) 
          or die("Ошибка " . mysqli_error($mysqli));	 
    	 //old  --> $sql = mysqli_query($mysqli,'INSERT INTO `room` (`id`, `name`, `date_creat`, `status`) VALUES (NULL, \''.$nameroom.'\', \'2019-05-06\', \'1\')');
		  $sql = mysqli_query($mysqli,'INSERT INTO `room` (`id`, `name`, `date_creat`, `status`, `time`) VALUES (\'\', \''.$nameroom.'\', \''.date("Y-n-j").'\', \'1\',\''.date("h:m:s").'\')');
		  mysqli_close($mysqli);//Закрываем соединение с базой		   
		  echo "ok";
?>