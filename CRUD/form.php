<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert Form</title>
</head>
<body>
<form method="post" action="formaction.php" enctype="multipart/form-data">
	Name: <input type="text" name="name"><br>
	Email: <input type="email" name="email"><br>
	Password: <input type="password" name="password"><br>
	Phone: <input type="number" name="phone"><br>
	Gender: <input type="radio" name="gender" value="Male">Male
	        <input type="radio" name="gender" value="Female">Female<br>
	Degree: <select name="degree">
			<option value="">Select</option>
			<option value="B.Tech">B.Tech</option>
			<option value="M.Tech">M.Tech</option>
			</select><br>
	Language: <input type="checkbox" name="lang[]" value="Bengali">Bengali
			  <input type="checkbox" name="lang[]" value="English">English
			  <input type="checkbox" name="lang[]" value="Hindi">Hindi<br>

	Image: <input type="file" name="image"><br>
	<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>