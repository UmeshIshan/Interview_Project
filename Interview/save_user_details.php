<?php

include("connect.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
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

// Step 2: Get the user details from the form
$name = $_POST['name'];
$email = $_POST['email'];
$personal_number = $_POST['personal_number'];
$home_number = $_POST['home_number'];
$hobbies1 = $_POST['hobby1'];
$hobbies = $_POST['hobby2'];
$hobbies = $_POST['hobby3'];
$hobbies = $_POST['hobby4'];
$hobbies = $_POST['hobby5'];




// Step 3: Insert the user details into the users table
$sql = "INSERT INTO user_details (name, email, personal_number, home_number) VALUES ('$name', '$email', '$personal_number', '$home_number')";
mysqli_query($conn, $sql);

// Get the user ID of the newly inserted user
$user_id = mysqli_insert_id($conn);


// Step 4: Insert the user's hobbies into the user_hobbies table
foreach ($hobbies as $hobby) {
    // Check if the hobby already exists in the hobbies table
    $sql = "SELECT id FROM hobbies WHERE name='$hobby'";
    $result = mysqli_query($conn, $sql);

    // If the hobby already exists, get its ID
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hobby_id = $row['id'];
    }
    // If the hobby doesn't exist, insert a new row and get its ID
    else {
        $sql = "INSERT INTO hobbies (name) VALUES ('$hobby')";
        mysqli_query($conn, $sql);
        $hobby_id = mysqli_insert_id($conn);
    }

    // Insert a new row into the user_hobbies table to associate the user with the hobby
    $sql = "INSERT INTO user_hobbies (user_id, hobby_id) VALUES ($user_id, $hobby_id)";
    mysqli_query($conn, $sql);
}

// Step 5: Close the database connection
mysqli_close($conn);
}
?>
