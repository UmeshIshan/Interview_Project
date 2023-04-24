<?php
// Step 1: Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interview_login";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Write a SQL query to retrieve the data from the table
$sql = "SELECT name FROM user_details";

// Step 3: Loop through the results of the query and fetch each row
$result = mysqli_query($conn, $sql);

// Display the results

echo'<p>The Users that are in the system</p>';
if(mysqli_num_rows($result) > 0) {
    echo "<ul>";
    while($row = mysqli_fetch_assoc($result)) {
       echo "<li>".$row["name"]."</li>";
    }
    echo "</ul>";
 } else {
    echo "No results found.";
 }

if(isset($_POST['submit'])){
    header("Location: User_add-Page.php");
    exit;
 }


// Step 5: Close the database connection
mysqli_close($conn);
?>
<html>
    <head>
    </head>
    <body>
    <form method="post">
  <!-- form fields go here -->
  <input type="submit" name="submit" value="Add another user">
        </form>
    </body>    
</html>