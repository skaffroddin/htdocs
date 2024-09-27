<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Create New Account</h2>
        <form id="registrationForm" enctype="multipart/form-data">
            <input type="text" id="name" name="name" placeholder="Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="text" id="phone" name="phone" placeholder="Phone" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="radio" name="gender" value="Male" required> Male
            <input type="radio" name="gender" value="Female" required> Female <br>
            <input type="text" name="course" id="course" placeholder="Course" required>
            <label>Languages:</label>
            <input type="checkbox" name="languages[]" value="English"> English
            <input type="checkbox" name="languages[]" value="Spanish"> Spanish
            <input type="checkbox" name="languages[]" value="French"> French <br>
            <label>Profile Image:</label>
            <input type="file" name="image" id="image" required> <br>
            <button type="submit">Register</button>
        </form>
        <div id="registerResult"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#registrationForm").on("submit", function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: 'formaction.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $("#registerResult").html(response);
                }
            });
        });
    </script>
</body>
</html>

