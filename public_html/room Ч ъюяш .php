<?php session_start(); ?>
<?php include_once 'head.php'; ?>

<body>


 <?php include_once 'autor.php'; ?>  

<!-- vladmaxi top bar -->
<?php include_once 'top.php'; ?>
<!--/ vladmaxi top bar -->

	<?php include_once 'menu.php'; ?>


<div class="col-xs-12 col-md-7 col-sm-9  col-lg-9 brd"> 
        
			 <?php
			
                  include_once 'config.php';
				  $name_room="Device";
				  $mysqli = new mysqli($host, $user, $pass, $db) 
                  or die("Ошибка " . mysqli_error($link));	 
				  
				   $sql = mysqli_query( $mysqli, 'SELECT * FROM `room` WHERE id ='.$_GET['id']);
				   $x=0;
				    
				   while ($result = mysqli_fetch_array($sql)) {
					  $name_room=$result['name'];
					  echo "<h1>".$name_room."</h1>";
				   }
				   
				   $sql = mysqli_query( $mysqli, 'SELECT * FROM `room`');
				   $x=0;
				    
				   while ($result = mysqli_fetch_array($sql)) {
					    $x++;
						echo '<a href="setdev.php?num='.$x.'">	<div class="col-xs-12 col-md-5 col-sm-3  col-lg-3 brd devices cntrt"> ';
						echo $name_room.'<div class="kartinkadev cntrk">  </div> <div class="zagolovok"> </div>  <input type="button" onclick="alert(\'Клик!\')" value="ON"/> <input type="button" onclick="alert(\'Клик!\')" value="OFF"/>  ';
						echo '</div>';
						echo '</a>';

					}	
					
			?>

</div>

    


</body>
</html>
