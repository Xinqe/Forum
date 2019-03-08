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

<p>Topic Creating....</p>

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
echo "Connection established!<br />";
// sql query to db, skapar en topic

if(isset($_POST['articleName']) && isset($_POST['topicContent']) && isset($_SESSION['userID']))
{

$SQLQuery = "INSERT INTO Topic(ArticleName, Content, PostDate, UserID) VALUES('".$_POST['articleName']."', '".$_POST['topicContent']."', NOW(), ".$_SESSION['userID']."); ";

if($conn->query($SQLQuery) === true)
{
    echo "Topic Created";
     $conn->close();
    header("Location:Topics.php");
}
    else
    {
         $conn->close();
        echo "SQL query failed, ".$conn-connect_error;
        header("Location:TopicCreate.php");
    }

}
else
{
     $conn->close();
    header("Location:TopicCreate.php");
}

?>


<?php
include "footer.html"
?>