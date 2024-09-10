<?php
require('dashboard/includes/conn.php');
$error = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHARMACY</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <style>
        body {
            background: url('/project/12.jpg') no-repeat center center fixed;
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
            <header>Login</header>
            <form class="header" method="post" action="login_inc.php"> 
                <div class="field input">
                    <label for="">Username</label>
                    <input type="text" name="username" placeholder="Provide your Username">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="field button"> 
                    <input type="submit" name="submit" value="LOGIN">
                </div>
                <?php echo $error?>
            </form>
            <p><a href="register.php">Register Here</a> | <a href="/project/frontpage.html">Home</a></p>
        </section>
    </div>
</body>
</html>
