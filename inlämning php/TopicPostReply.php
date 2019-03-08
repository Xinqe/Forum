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

<p>Create post</p>
<?php 
if(isset($_GET['TopicID']))
{
echo "<form action="."PostCreation.php?TopicID=".$_GET['TopicID']." method="."post".">
            <p>Content of the post:</p>";
    
 //   echo "        <input type="."text"." name="."postContent"." class="."inputFields"." required>";
               echo " <textarea name="."postContent"." maxlength="."10000"." required ></textarea>";
    
       echo"<br/>";
    echo"<a href="."Topic.php?TopicID=".$_GET['TopicID']." class="."inputButtons"."> back</a>";
          echo"<input type="."submit"." value="."Reply"." class="."inputButtons".">

    </form>";
}
else
{
  header("Location:Topics.php");
}

?>
<?php
include "footer.html"
?>