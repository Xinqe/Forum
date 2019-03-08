<?php
include "header.php"
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
echo "Connection established!<br />";


if(isset($_POST['password']) && isset($_POST['passwordConfirm'])) // validations
{
    $pw1 = $_POST['password'];
$pw2 = $_POST['passwordConfirm'];
    
        if($pw1 == $pw2)
{
    echo "matched passwords";
}
else
{
        $conn->close();
    echo "Unmatched passwords";
    header("Location:AccountCreationFail.php");
}
}




if(isset($_POST['username']))
{
$SQLQuery = "SELECT * FROM User WHERE Username ='".$_POST['username']."';";

$result = $conn->query($SQLQuery);

$count = mysqli_num_rows($result);

if($count > 0)
{

    $conn->close();
    echo "Invalid Username";
    header("Location:AccountCreationFail.php");
}
}

// sql query into db

$SQLQuery = "INSERT INTO User(Username, UserPassword) VALUES ('".$_POST['username']."', '".$_POST['password']."');";

        if ($conn->query($SQLQuery) === TRUE){
            echo("<p><h1>Account has been created</h1></p>");
             $conn->close();
            header("Location:AccountCreationSuccess.php");
        } 
        else{
            echo("<p>SQL Query failed ".$conn->connect_error.". Try again.</p>");
                $conn->close();
                header("Location:AccountCreationFail.php");
        }

$conn->close();

?>
<?php
include "footer.html"
?>