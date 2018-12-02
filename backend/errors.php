<?php  
include "user_registration.php";

    if (count($errors) > 0){
        echo "<div class='error'>";

        
            foreach($errors as $error): 

                echo '<p>';
                echo $error;
                echo '</p>';

            endforeach;

        echo "</div>";

        }
    else{
        exit();
        echo "$meldingen"; 
        
        }
  ?>