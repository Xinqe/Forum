<?php
include "header.php"
?>
<?php 

if(isset($_SESSION['loggedIn'])) // logging out, clearing sessions
{
    $_SESSION['loggedIn'] = false;
    session_unset();
    session_destroy();
    header("Location:Home.php");
}

?>
 
<?php
include "footer.html"
?>