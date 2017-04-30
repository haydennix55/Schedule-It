<?php
session_start();
 ?>
 
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="registration-complete.css" media="screen" />
   <body>
       <div>
           <h1 class="message">Thanks for Registering!</h1>
       </div>
       <div class="buttons">
           <form action="http://schedule-it.herokuapp.com/user-dashboard/index.php">
               <button type="submit" class="linkButton">Continue to Dashboard</button>
           </form>
           <form action="http://schedule-it.herokuapp.com/login-page/index.php">
               <button type="submit" class="linkButton">Login Page</button>
           </form>

       </div>

   </body>
</html>
