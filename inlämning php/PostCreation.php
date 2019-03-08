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

<p>Creating post</p>
<?php 
if(isset($_GET['TopicID']))
{
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
    
if(isset($_POST['postContent'])) // sql query to db 
{
    
    $SQLQuery = "INSERT INTO Post(Content, UserID, TopicID, PostDate) VALUES('".$_POST['postContent']."', ".$_SESSION['userID'].", ".$_GET['TopicID'].", NOW());";


if($conn->query($SQLQuery) === true)
{
    echo "Post Created";
     $conn->close();
    header("Location:Topic.php?TopicID=".$_GET['TopicID']);
}
    else
    {
         $conn->close();
        echo "SQL query failed, ".$conn-connect_error;
        header("Location:TopicPostReply.php?TopicID=".$_GET['TopicID']);
    } 
}
}
else
{
    echo "post";
    header("Location:Topics.php");
}

?>
<?php
include "footer.html"
?>