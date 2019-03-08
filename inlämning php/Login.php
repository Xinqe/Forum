<?php
include "header.php"
?>

 <form action="LoginValidate.php" method="post">

            <p>Sign in</p>
            <br/>
            <p>Username:</p> 

            <input type="text" name="username" class="inputFields" required>
            <br>
            <p>Password:</p> 
            <input type="password" name="password" class="inputFields" required>
            <br>
            <br>
            <input type="submit" value="Login" class="inputButtons">
            
     <a href="Register.php" class="inputButtons">Register an account</a>
    </form>
<br/>

<?php
include "footer.html"
?>