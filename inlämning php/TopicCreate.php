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

<div class="responsiveContainer">
<p>Create topic</p>

<form action="TopicCreation.php" method="post">

            <p>Title of topic:</p> 
            <input type="text" name="articleName" class="inputFields" maxlength="60" required>
            <br>
            <p>Content of topic:</p> 
         <!--   <input type="text" name="topicContent" class="inputFields" required > -->
            <textarea name="topicContent" maxlength="10000" required ></textarea>
            <br/>
            <a class="inputButtons" href="Topics.php">Back</a>
            <input type="submit" value="Create topic" class="inputButtons" >

    </form>
</div>
<?php
include "footer.html"
?>