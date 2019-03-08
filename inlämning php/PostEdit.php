<?php
include "header.php"
?>
<?php 
if(!isset($_SESSION['loggedIn']))
{
    header("Location:Home.php");
}
else if($_SESSION['loggedIn'] == false)
{
    header("Location:Login.php");
}
?>

<p>Edit topic</p>

<?php
$servername = "localhost";
$username = "rotr0001";
$password = "Somnus2117";
$dbname = "rotr0001";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connection established!<br />";


if(isset($_GET['PostID']) && isset($_GET['TopicID'])) // skaffar en "placeholder" åt redigering av post
{
    
    
    $SQLQuery = "SELECT * FROM Post WHERE ID =".$_GET['PostID'].";";
    
    
    
    $result = $conn->query($SQLQuery);
    
     if($result->num_rows > 0)
        {
        while($row = $result->fetch_assoc()) 
        {
            
        echo "<form action="."PostUpdate.php?PostID=".$_GET['PostID']."&TopicID=".$_GET['TopicID']." method="."post".">";
            
            
        echo "<legend>Edit Content of a post</legend>";
            echo " <textarea name="."postContent"." maxlength="."10000"." required >".$row['Content']."</textarea>";
        echo "<br/>";
        echo"<a href="."Topic.php?TopicID=".$_GET['TopicID']." class="."inputButtons"."> back</a>";
        echo "<input type="."submit"." value="."Update post"." class="."inputButtons".">";
        echo "</form>";
            $conn->close();
        }
    

}
}
/*else
{
    $conn->close();
    if(isset($_GET['TopicID']))
    {
        header("Location:Topic.php?TopicID=".$_GET['TopicID']);
    }
    else
    {
    header("Location:Topics.php");
    }
}
*/


?>
<?php
include "footer.html"
?>