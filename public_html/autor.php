<?php //Проверка на статического пользователя, в будущем из БД
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