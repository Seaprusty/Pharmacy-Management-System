<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHARMACY :: REGISTER </title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <script>
        function validateForm() {
            var username = document.forms["registrationForm"]["username"].value;
            var password = document.forms["registrationForm"]["password"].value;
            var confirmPassword = document.forms["registrationForm"]["confirm_password"].value;

            // Username validation
            if (username == "") {
                alert("Username must be filled out");
                return false;
            }
            if (username.length < 6) {
                alert("Username must be at least 6 characters long");
                return false;
            }

            // Password validation
            if (password == "") {
                alert("Password must be filled out");
                return false;
            }
            if (password.length < 6) {
                alert("Password must be at least 6 characters long");
                return false;
            }
            if (!(/[a-zA-Z]/.test(password) && /[0-9]/.test(password))) {
                alert("Password must contain both letters and numbers");
                return false;
            }

            // Confirm Password validation
            if (password != confirmPassword) {
                alert("Passwords do not match");
                return false;
            }

            return true;
        }
    </script>
       <style>
        body {
            background: url('/project/13.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .wrapper {
            background: rgba(255, 255, 255, 0.9); /* Slightly transparent background for the wrapper */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <section class="form sign up">
            <header>Registration form</header>
            <form name="registrationForm" action="register_inc.php" method="post" onsubmit="return validateForm()">
                <div class="name-details"></div>
                <div class="field input">
                    <label for="">Username</label>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="field input">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="REGISTER">
                </div>
            </form>
        </section>
    </div>
</body>
</html>
        