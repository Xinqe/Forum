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
echo "Connection established!<br />";

$SQLQuery = "UPDATE Topic SET ArticleName = '".$_POST['articleName']."', Content = '".$_POST['topicContent']."'
 WHERE ID =".$_GET['TopicID'].";";

$result = $conn->query($SQLQuery); // sql query to db, updaterar en topic

if ($conn->query($SQLQuery) === TRUE){
            echo("<p><h1>Topic has been updated</h1></p>");
             $conn->close();
            header("Location:TopicUpdated.php");
        } 
        else{
            echo("<p>SQL Query failed ".$conn->connect_error.". Try again.</p>");
                $conn->close();
                header("Location:TopicEdit.php");
        }

    $conn->close();
?>
<?php
include "footer.html"
?>