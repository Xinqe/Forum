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

if(isset($_GET['TopicID']))
{
    
    $SQLQuery = "SELECT * FROM Topic WHERE ID =".$_GET['TopicID'].";";
    $result = $conn->query($SQLQuery);
    
     if($result->num_rows > 0)
        {
        while($row = $result->fetch_assoc()) // sql query to db, skaffar en "placeholder"
        {
        
            
              echo
"<form action="."TopicUpdate.php?TopicID=".$_GET['TopicID']." method="."post".">

            <legend>Edit Articlename or Content</legend>
            <p>Title of topic:</p> 
            <input type="."text"." name="."articleName"." value=".$row['ArticleName']." maxlength="."60"." class="."inputFields"." required>
            <br>
            <p>Content of topic:</p> ";
           echo " <textarea name="."topicContent"." maxlength="."10000"." required >".$row['Content']."</textarea>";
            echo " <br/>
            <a href="."Topics.php"." class="."inputButtons".">back</a>
            
            <input type="."submit"." value="."Update topic"." class="."inputButtons".">

    </form>";
            $conn->close();
        }
    

}
}
else
{
    $conn->close();
    header("Location:Topics.php");
}


?>
<?php
include "footer.html"
?>