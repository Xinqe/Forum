<?php
include "header.php"
?>

<p>Detta är valideringssidan</p>

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


$username = "";
$password = "";


if(isset($_POST['username']))
{
        $username = $_POST['username'];
}

if(isset($_POST['password']))
{
    $password = $_POST['password'];
}

// sql query to db

$SQLQuery = "SELECT * FROM User WHERE Username ='".$username."' AND UserPassword ='".$password."';";

$result = $conn->query($SQLQuery);

$count = mysqli_num_rows($result);




if($count == 1)
{
    echo "Valid login";
    if(mysqli_num_rows($result)){

        $row = mysqli_fetch_assoc($result);

        $_SESSION['loggedIn'] = true; 
        $_SESSION['username'] = $row['Username'];
        $_SESSION['userID'] = $row['ID'];
        $_SESSION['lastLogin'] = time(); 
        
        $conn->close();
        header("Location:Home.php");

}
    
}
else
{
    $conn->close();
    echo "Invalid Username or Password";
    header("Location:Login.php");
}

$conn->close();
?>

<?php
include "footer.html"
?>