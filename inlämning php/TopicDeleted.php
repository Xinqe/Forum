<?php
include "header.php"
?>
<?php 
if(!isset($_SESSION['loggedIn']))
{
    header("Location:Login.php");
}
else if($_SESSION['loggedIn'] == false)
{
    header("Location:Login.php");
}
?>

<script>setTimeout(function(){window.location.href="/~rotr0001/z/Topics.php"},3000);</script>
<p>Deleted the topic, redirecting you to topics in 3 seconds</p>


<?php
include "footer.html"
?>