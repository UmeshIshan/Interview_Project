<!DOCTYPE html>
<html>
<head>
	<title>Upload User Details</title>
</head>
<body>
	<h1>Upload User Details</h1>
	<form method="post" action="save_user_details.php" enctype="multipart/form-data">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br><br>
		
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>
		
		<label for="phone">Personal Number:</label>
		<input type="tel" id="phone" name="personal_number" pattern="[0-9]{10}" required><br><br>

        <label for="phone">Home Number:</label>
		<input type="tel" id="phone" name="home_number" pattern="[0-9]{10}" required><br><br>
		
		<label for="hobbies">Hobbie 1:</label>
		<input type="text" id="name" name="hobby1" ><br><br>

        <label for="hobbies">Hobbie 2:</label>
		<input type="text" id="name" name="hobby2" ><br><br>
        
        <label for="hobbies">Hobbie 3:</label>
		<input type="text" id="name" name="hobby3" ><br><br>

        <label for="hobbies">Hobbies 4:</label>
		<input type="text" id="name" name="hobby3" ><br><br>

        <label for="hobbies">Hobbies 5:</label>
		<input type="text" id="name" name="hobby3" ><br><br>
		
		<input type="submit" value="Submit">
	</form>

</body>
</html>
