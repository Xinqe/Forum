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
<?php
if(isset($_GET['TopicID']))
{
    echo "<div class="."deleteform".">";
    echo "<h1>Do you want to delete the selected topic?</h1>";
    echo "<br>";
echo "<a class="."inputButtons"." href="."Topics.php".">Back</a>";
echo "<span>    </span>";
echo "<a class="."inputButtons"." href="."TopicDeleting.php?TopicID=".$_GET['TopicID'].">Delete</a>";
    echo "</div>";
}
else
{
    header("Location:Topics.php");
}
?>

<?php
include "footer.html"
?>