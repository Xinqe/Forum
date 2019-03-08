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
<nav class="navTopic">
<ul>
    <li><h1>Topics</h1></li>
<li><a href="TopicCreate.php" class="inputButtons">Create topic</a></li>    
</ul>
</nav>

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



$SQLQuery = "SELECT * FROM Topic ORDER BY PostDate DESC;";
$username = "";
    
$result = $conn->query($SQLQuery);
if($result->num_rows > 0) // skriver ut alla topics
{
    echo "<div class="."responsiveContainer".">";
    echo "<table class="."DataPresenter".">";  
        
      echo "<tr>
      <th>Posted by</th>
      <th>Article</th>
      <th>Post date</th>
      <th></th>
      </tr>";
    while($row = $result->fetch_assoc()) 
    {
        
        $SQLUserID = "SELECT * FROM User WHERE ID = ".$row['UserID'].";"; // läser författaren
        $resultUser = $conn->query($SQLUserID);
        if($resultUser->num_rows > 0)
        {
        while($rowUser = $resultUser->fetch_assoc()) 
        {
           $username = $rowUser['Username'];
        }
        }
        
echo "<tr> 
<td>".$username." </td>
<td class="."TopicSize"."> <a href="."Topic.php?TopicID=".$row['ID']." >".$row['ArticleName']."</a>"."</td>
<td> ".$row['PostDate']." </td>
<td>";
        
       if($row['UserID'] == $_SESSION['userID'])
        {

            echo "<a href="."DeleteTopicConfirm.php?TopicID=".$row['ID']." class="."inputButtons".">Delete   </a>";
           echo "<p> </p>";
             echo "<a href="."TopicEdit.php?TopicID=".$row['ID']." class="."inputButtons".">Edit         </a>";

        }  

echo "</td>
</tr>";
        
        


    }
    
    echo "</table>";
    echo "</div>";
}

$conn->close();
?>

<?php
include "footer.html"
?>