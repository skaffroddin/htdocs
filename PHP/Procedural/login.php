<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>User Login</h2>
        <form id="loginForm">
            <input type="text" id="login_email_phone" name="login_email_phone" placeholder="Email or Phone" required>
            <input type="password" id="login_password" name="login_password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div id="loginResult"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#loginForm").on("submit", function (e) {
            e.preventDefault();

            $.ajax({
                url: 'login_action.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    $("#loginResult").html(response);
                }
            });
        });
    </script>
</body>
</html>

