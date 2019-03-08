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
<nav class="navPost">
<ul>
<li><h2>Post info</h2></li>
<li><?php echo "<a href="."TopicPostReply.php?TopicID=".$_GET['TopicID']." class="."inputButtons".">Reply</a>"; ?></li>    
</ul>
</nav>

<?php 

function boop (){
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
    
    echo "<div class="."responsiveContainer".">";
    echo "<table class="."DataPresenter".">";  
    echo "<tr>
    <th>Posted by</th>
    <th>Content</th>
    <th> </th>
    </tr>";
        


$SQLUserQuery = "";
$SQLQuery = "SELECT * FROM Topic WHERE ID =".$_GET['TopicID'].";"; // läser topic
    
$result = $conn->query($SQLQuery);
if($result->num_rows > 0)
{
    
    while($row = $result->fetch_assoc()) // styla till detta senare
    {
       

        
        $SQLUserQuery = "SELECT * FROM User WHERE ID = ".$row['UserID'].";"; // läser författaren
        $resultUser = $conn->query($SQLUserQuery);
        if($resultUser->num_rows > 0)
        {
        while($rowUser = $resultUser->fetch_assoc()) 
        {
            echo "<tr>";
            echo "<td>"."<p>".$rowUser['Username']."</p>"."<p>"."Posted: ".$row['PostDate']."</p>"."</td>";
            echo "<td class="."PostSize".">"."<b>".$row['ArticleName']."</b>";
            echo "<br/> <p>".$row['Content']."</p>";
            echo  "</td>";
            echo "<td> </td>";
            echo "</tr>";
        }

        }

    }
}
    
    
    
$SQLQuery = "SELECT * FROM Post WHERE TopicID =".$_GET['TopicID'].";"; // läser posts som tillhör specific topic
    
$result = $conn->query($SQLQuery);
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) // styla till detta senare
    {

        
        $SQLUserID = "SELECT * FROM User WHERE ID = ".$row['UserID'].";"; // läser författaren
        $resultUser = $conn->query($SQLUserID);
        if($resultUser->num_rows > 0)
        {
        while($rowUser = $resultUser->fetch_assoc()) 
        {
            echo "<tr>";
            echo "<td>".$rowUser['Username']."<p>"."Posted: ".$row['PostDate']." <p>"."</td>";
            echo "<td class="."PostSize".">".$row['Content']."</td>";
            
            echo "<td>";
            
        if($row['UserID'] == $_SESSION['userID'])  // möjligt problem
        {
            echo "<a href="."DeletePostConfirm.php?PostID=".$row['ID']."&TopicID=".$_GET['TopicID']." class="."inputButtons".">Delete</a>";
             
            echo "<p> </p>";
             
             echo "<a href="."PostEdit.php?PostID=".$row['ID']."&TopicID=".$_GET['TopicID']." class="."inputButtons".">Edit</a>";
             
        }
            echo "</td>";
            
      
            echo "</tr>";
        }
        }
    }
}
    
    echo "</table>";

        
    echo "<a href="."TopicPostReply.php?TopicID=".$_GET['TopicID']." class="."inputButtons"." id="."ReplyLink".">Reply</a>"; 
    
        echo "</div>";
    
    $conn->close();
}

if(isset($_GET['TopicID']))
{
boop();
}
else
{
    header("Location:Home.php");
}

?>




<?php
include "footer.html"
?>