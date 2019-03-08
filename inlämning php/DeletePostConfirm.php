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
    echo "<div class="."deleteform".">";
    echo "<h1>Do you want to delete the post?</h1>";
if(isset($_GET['TopicID']))
{
    echo "<a class="."inputButtons"." href="."Topic.php?TopicID=".$_GET['TopicID'].">Back</a>";
}
else
{
    echo "topic id fail";
    header("Location:Topics.php");
}

echo "<span>    </span>";

if(isset($_GET['PostID']) )
{
echo "<a class="."inputButtons"." href="."PostDeleting.php?PostID=".$_GET['PostID']."&TopicID=".$_GET['TopicID'].">Delete</a>";
}
else
{
    echo "post id fail";
   header("Location:Topics.php");
}
echo "</div>";
?>

<?php
include "footer.html"
?>