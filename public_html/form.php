<form id="login" action="index.php?rooms" method="post">
    <h1>Smart device</h1>
    
    <fieldset id="inputs">
        <input id="username" name="name" type="text" placeholder="Логин" autofocus required>   
        <input id="password" name="pass" type="password" placeholder="Пароль" required>
		<br>
    </fieldset>
	
    <fieldset id="actions">
        <input type="submit" id="submit" value="ВОЙТИ">
        <div class="err">  <?php  if(isset($err)) echo $err; ?>  </div> 
         
      
        
    </fieldset>
    
    
</form>