<?php  
include "user_registration.php";
include "user_validation.php";
require "db_connect.php";

if (count($errors) > 0) : ?>
  <div class="error">

  	<?php foreach ($errors as $error) : ?>

  	  <p><?php echo $error ?></p>

  	<?php endforeach ?>

  </div>

<?php  endif ?>