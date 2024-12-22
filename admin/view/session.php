<?php
      if(isset($_SESSION['errors'])){ ?>
        <div class="alert alert-success"> <?php echo $_SESSION['errors'] ?></div>
      <?php }

      if(isset($_SESSION['sucess'])){ ?>
        <div class="alert alert-success"> <?php echo $_SESSION['sucess'] ?></div>
    <?php 
  }
  
  session_unset();
  