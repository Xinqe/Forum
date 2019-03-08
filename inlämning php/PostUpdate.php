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



if(isset($_POST['postContent']) && isset($_GET['PostID'])) // sql query to update post
{

$SQLQuery = "UPDATE Post SET Content = '".$_POST['postContent']."' WHERE ID =".$_GET['PostID'].";"; 
/*    
echo $_POST['postContent'];
echo "<br>";
echo "<br>";
echo $_GET['PostID'];
echo "<br>";
echo "<br>";
echo $_GET['TopicID'];
echo "<br>";
echo "<br>";
    echo $SQLQuery; */

$result = $conn->query($SQLQuery);

if ($conn->query($SQLQuery) === TRUE){
            echo("<p><h1>Post has been updated</h1></p>");
             $conn->close();

               header("Location:Topic.php?TopicID=".$_GET['TopicID']);

        } 
        else{
            echo("<p>SQL Query failed ".$conn->connect_error.". Try again.</p>");
                $conn->close();
               header("Location:PostEdit.php?PostID=".$_GET['PostID']."?TopicID=".$_GET['TopicID']);

        }
}
else
{
         $conn->close();
    echo "shouldn't be here";
    //header("Location:Topics.php");
}

 
?>
<?php
include "footer.html"
?>