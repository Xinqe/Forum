<?php 
session_start();

if(isset($_SESSION['lastLogin']) && (time() - $_SESSION['lastLogin'] > 300)) // 300 sekunder session timeout(5 min), tar bort all session, inklusive login. 
{
    session_unset();
    session_destroy();
}
 $_SESSION['lastLogin'] = time(); 

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Forum</title>
     <meta name="Scale" content="width=device_width, initial-scale=1.0"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport2" content="width=500, initial-scale=1">
      <link rel="stylesheet" href="Layout.css">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="Functions.js" ></script>


    </head>
    
    <body>
    <header>
        <img src="Doge.png" id="logo" alt="img couldn't be loaded">
        </header>
        <nav class="navBar">
            <ul>
            <li><a href="Home.php">Home</a></li>
                
                <?php 
                if(isset($_SESSION['loggedIn']))
                {
                    if($_SESSION['loggedIn'] == true)
                    {
            echo "<li><a href="."Topics.php".">Topics</a></li>";         
            echo "<li><a id="."navLogout"." href="."Logout.php".">Logout</a></li>";
                    }
                }
                else 
                 {
            echo "<li><a id="."navRegister"." href="."Register.php".">Register</a></li>";
            echo "<li><a id="."navLogin"." href="."Login.php".">Login</a></li>";
                 }
                
                ?>
            </ul>
        </nav>
        <section class="content">
        
        

            
            
            
            
            
            
  