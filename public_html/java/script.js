const nameDlina = 15;


function showroom() //показываем комнаты из бд
		{ 
		$('#otvet').html("<br><br><h2 style='text-align:center;'>Загрузка...</h2 ></div>");
            $.ajax({
			  url: "showroom.php",
			  success: function(data,status) {
			    $('#otvet').html(data);
			  }
			});
		}
		
		

		
function showdevice(param) //показываем комнаты из бд
		{ 
		$('#otvetd').html("<br><br><h2 style='text-align:center;'>Загрузка...</h2 ></div>");
            $.ajax({
			  url: "loadroom.php?device&"+param,
			  success: function(data,status) {
			    $('#otvetd').html(data);
			  }
			});
		}


		
		//setInterval(showroom, 5000);

function ready() { //Функция исполняемая перед загрузкой
  showroom();//отображаем все комнаты из бд
  showdevice("all");
}

document.addEventListener("DOMContentLoaded", ready);

function delete_room(id)//Передаем id что бы скрипт вернул название
{   
			$.ajax({
			  url: "idtoname.php?id="+id,
			  success: function(data,status) {
				  //name_r=;
				//$('#otvet').html(data);
				result = confirm("Удалить комнату "+data+"?"); //
				
				
				if (result){ //если нажали ок, значит отправляем запрос на удаление
				    $.ajax({
					url: "del.php?id="+id,
					success: function(data,status) {
					showroom();//отображаем все комнаты из бд
			  }
			    });
			   }				
				
				
				
				
			  }
			});
			
					
			
			
}

function power(position,numer) //Функция вкл выкл устройств
{
         $.ajax({
			  url: "control/esp.php?power="+position+"&number="+numer,
			  success: function(data,status) {
				showdevice("all");  
			   alert(data);
			   
			  }
			});
			  
			
	 
	 
	 
}

function creat_room() //Создание новой комнаты
{
	result = prompt("Название комнаты", "");//Просим ввести имя будущей комнаты
	if(result.length > nameDlina) //проверяем длину названия будущей комнаты
	   {
		   alert('Имя не должно превышать '+nameDlina+' символов, у вас '+result.length);
		   exit();//после выходим, что бы не отправлять запрос на сервер
		   return;
	   }
	   
	if(result.length == 0) //проверяем длину названия будущей комнаты
	   {
		   alert('Имя не должно быть пустым!');
		   exit();//после выходим, что бы не отправлять запрос на сервер
		   return;
	   }   
	   

	if (result == null) return;// еще одна проверка на пустоту
		
		$.ajax({
				  url: "creatroom.php?name="+result,
				  success: function(data,status) {//Отправляем на проверку серверу(так на всякий случай что бы и там проверили)
					  if(data == 1) //если php скрипт вернул 1
					          {alert('Имя не должно превышать '+nameDlina+'  символов');}
					  if(data == 2) //если php скрипт вернул 2
					          {alert('Имя не должно быть пустым.');}	  
					  showroom();//сразу отображаем заного все комнаты вместе с новой
					  
				  }
				});


}



















