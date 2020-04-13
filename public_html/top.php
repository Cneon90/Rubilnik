    <div class="vladmaxi-top">
         <?php  if(!isset($_SESSION['autor']) ||($_SESSION['autor']==0))  echo  "Вы не авторизованы"; ?> <!-- верхний левый блок -->
        <span class="right">
          <?php
             if(isset($_SESSION['autor']) &&($_SESSION['autor']==1)) { echo "<a href='?out=logoff'>Выйти </a>";}
           ?> <!-- верхний правый блок -->  
            
        </span>
    <div class="clr"></div>
    </div>