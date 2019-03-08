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

if(isset($_GET['PostID'])) // sql query to db, deleting post
{

$SQLQuery = "DELETE FROM Post WHERE ID = ".$_GET['PostID'].";";
echo $SQLQuery;

if($conn->query($SQLQuery) === true)
{
    echo "Post Deleted";
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
else
{
         $conn->close();
        echo ("SQL query failed, ".$conn-connect_error);
        header("Location:Topics.php");
}

}

     $conn->close();
   echo "this shouldn't appear";

?>





<?php
include "footer.html"
?>