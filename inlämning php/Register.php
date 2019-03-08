<?php
include "header.php"
?>

 <form action="AccountCreation.php"  method="post">

            <legend>Type in information</legend>
            <p>Username:</p> 

            <input type="text" name="username" class="inputFields" required>
            <br>
            <p>Password:</p> 
            <input type="password" name="password" class="inputFields" id="pw" onkeyup='PasswordValidateLength();' required>
            <br/>
            <p>Confirm password:</p>
            <input type="password" name="passwordConfirm" class="inputFields" id="pw2" required>
            <br/>
            <br/>
            <a href="Home.php" class="inputButtons">Back</a>
            <input type="submit" value="Create account" class="inputButtons" id="submitButton">

    </form>
<p id="errorMessage"></p>
<br/>
<?php
include "footer.html"
    // onkeyup='PasswordMatch();' 
?>