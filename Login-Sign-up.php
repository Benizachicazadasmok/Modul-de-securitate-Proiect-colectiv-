<?php include 'includes/sesion_starter.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Team management</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/login-sign-up.css">

</head>

<body>

    <!-- Login form -->
    <div id="Login">
        <div class="login_signupSection animate">
            <div class="info">
                <?php
                if (isset($_GET["error"])) {

                    if ($_GET["error"] == "sign-up_succes") {
                        echo "<p style='color:green; text-align: center'>Succesfuly created an account!</p>";
                    }


                    if ($_GET["error"] == "wronglogin") {
                        echo "<p style='color:red; text-align: center'>Wrong Username or Password!</p>";
                    }

                    if ($_GET["error"] == "emptyinput") {
                        echo "<p style='color:red; text-align: center'>Please fill the fields</p>";
                    }

                    if ($_GET["error"] == "db_error") {
                        echo "<p style='color:red; text-align: center'>Database error!</p>";
                    }
                }
                ?>
                <h2>Team management application</h2>
                <img src="img/logo.png" class="logo">
                <p>Teamwork was never easier!</p>
                <h5>You don't have an account? <br> Make one now!</h5>
                <button onclick="document.getElementById('Sign-up').style.display='block'; document.getElementById('Login').style.display='none' " style="width:auto;" id="submit-btn">Sign-up</button>

            </div>
            <form action="includes/login.inc.php" method="POST" class="loginForm">
                <h1>Login</h1>
                <ul class="noBullet">
                    <li>
                        <label for="username">Username</label><br>
                        <input type="text" class="inputFields" id="username" name="username" placeholder="Username" required />
                    </li><br>
                    <li>
                        <label for="password">Password</label><br>
                        <input type="password" class="inputFields" id="password" name="password" placeholder="Password" required />
                    </li>


                    <li id="center-btn">
                        <button type="submit" id="submit-btn" name="submit">Login</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>



    <!-- Sign-up form -->
    <div id="Sign-up">
        <div class="login_signupSection animate">
            <div class="info">
                <?php
                if (isset($_GET["error"])) {

                    if ($_GET["error"] == "emptyinput") {
                        echo "<p style='color:red; text-align: center'>Fill in all fields!</p>";
                    } elseif ($_GET["error"] == "invalidUid") {
                        echo "<p style='color:red; text-align: center'>Chose a proper username!</p>";
                    } elseif ($_GET["error"] == "invalidEmail") {
                        echo "<p style='color:red; text-align: center'>Chose a proper email!</p>";
                    } elseif ($_GET["error"] == "passwordsdontmatch") {
                        echo "<p style='color:red; text-align: center'>Passwords don't match!</p>";
                    } elseif ($_GET["error"] == "stmtfailed") {
                        echo "<p style='color:red; text-align: center'>Something went wrong, try again!</p>";
                    } elseif ($_GET["error"] == "usernametaken") {
                        echo "<p style='color:red; text-align: center'>The username  is already taken!</p>";
                    } elseif ($_GET["error"] == "emailtaken") {
                        echo "<p style='color:red; text-align: center'>The email  is already taken!</p>";
                    } elseif ($_GET["error"] == "none") {
                        echo "<p style='color:green; text-align: center'>Succes!</p>";
                    }
                }
                ?>
                <h2>Team management application</h2>
                <img src="img/logo.png" class="logo">
                <p>Teamwork was never easier!</p>
                <h5>Already have an account?<br> Login!</h5>
                <button onclick="document.getElementById('Login').style.display='block'; document.getElementById('Sign-up').style.display='none'" style="width:auto;" id="submit-btn">Login</button>

            </div>
            <form action="includes/signup.inc.php" method="POST" class="signupForm">
                <h1>Sign-up</h1>
                <ul class="noBullet">
                    <li>
                        <label for="username">Username</label><br>
                        <input type="text" class="inputFields" id="username" name="username" placeholder="Username" required />
                    </li>
                    <li>
                        <label for="email">Email</label><br>
                        <input type="email" class="inputFields" id="email" name="email" placeholder="Email" required />
                    </li>
                    <li>
                        <label for="password">Password</label><br>
                        <input type="password" class="inputFields" id="password" name="password" placeholder="Password" required />
                    </li>
                    <li>
                        <label for="password">Repeat password</label><br>
                        <input type="password" class="inputFields" id="password" name="password-repeat" placeholder="Repeat password" required />
                    </li>

                    <li id="center-btn">
                        <button type="submit" id="submit-btn" name="submit">Sign-up</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var login = document.getElementById('Login');
        var signup = document.getElementById('Sign-up');
        signup.style.display = "none";
    </script>

</body>

</html>