<?php include 'includes/sesion_starter.php';?>
<!DOCTYPE html>
<html>
  <head>

    <link rel="stylesheet" href="css/login.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="js/see-psw.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="img/logo_site.png" />
    <title>SM-Security Module</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="">
  </head>

  <body style = " background-image: url('img/login.jpg');">

    <div class="modal-content animate"  id="login">

    	<?php
			if(isset($_GET["error"])){
				
					if($_GET["error"] == "sign-up_succes"){
					echo "<p style='color:green; text-align: center'>Succesfuly created an account!</p>";
				}


				if($_GET["error"] == "wronglogin"){
					echo "<p style='color:red; text-align: center'>Wrong Username or Password!</p>";
				}

				if($_GET["error"] == "emptyinput"){
					echo "<p style='color:red; text-align: center'>Please fill the fields</p>";
				}

				if($_GET["error"] == "db_error"){
					echo "<p style='color:red; text-align: center'>Database error!</p>";
				}
			}
		?>

      <form action="includes/login.inc.php" method="post">

        <div class="imgcontainer">
          <img src="img/icon.png" alt="Avatar" class="avatar">
        </div>
			<h2>Login</h2>
        <div class="container">

          <label for="uname">
            <b>Username</b>
          </label>

          <input type="text" placeholder="Enter Username" name="uname" required style="border:none;">

          <label for="psw">
            <b>Password</b>
          </label>

          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
		  <input type="checkbox" onclick="seePsw()"><label> Show Password </label>
          <button type="submit" name="submit">Login</button>

          <label> <h3 style="text-align: center">OR</h3></label>

      </form>

        <button onclick="document.getElementById('signup').style.display='block'; document.getElementById('login').style.display='none' " style="width:auto;">
          <p style="text-align: center">Sign-up</p>
        </button>

    		</div>
  	</div>



<div class="modal-content animate " id="signup">

<?php
			if(isset($_GET["error"])){
				
				if($_GET["error"] == "emptyinput"){
					echo "<p style='color:red; text-align: center'>Fill in all fields!</p>";
				}
				elseif($_GET["error"] == "invalidUid"){
					echo "<p style='color:red; text-align: center'>Chose a proper username!</p>";
				}
				elseif($_GET["error"] == "invalidEmail"){
					echo "<p style='color:red; text-align: center'>Chose a proper email!</p>";
				}
				elseif($_GET["error"] == "passwordsdontmatch"){
					echo "<p style='color:red; text-align: center'>Passwords don't match!</p>";
				}
				elseif($_GET["error"] == "stmtfailed"){
					echo "<p style='color:red; text-align: center'>Something went wrong, try again!</p>";
				}
				elseif($_GET["error"] == "usernametaken"){
					echo "<p style='color:red; text-align: center'>The username  is already taken!</p>";
				}
				elseif($_GET["error"] == "emailtaken"){
					echo "<p style='color:red; text-align: center'>The email  is already taken!</p>";
				}
				elseif($_GET["error"] == "none"){
					echo "<p style='color:green; text-align: center'>Succes!</p>";
				}
			}
		?>

<form action="includes/signup.inc.php" method="post">

        <div class="imgcontainer">
          <img src="img/icon.png" alt="Avatar" class="avatar">
        </div>

	<h2>Sign-up</h2>
	<div class="container">
    <label for="uname"><b>Username</b></label><br><br>
    <input type="text" placeholder="Enter your username" name="uname" required>
	</div>
	
<div class="container">
    <label for="uname"><b>Email</b></label><br><br>
    <input type="text" placeholder="Enter the email addres" name="email" required>
	</div>

	<div class="container">
    <label for="uname"><b>Password</b></label><br><br>
    <input type="password" placeholder="Enter Password" name="psw" required>
	</div>

	<div class="container">
    <label for="psw"><b>Repeat the password</b></label><br><br>
    <input type="password" placeholder="Enter Password" name="psw-repeat" required>
	</div>
        <br>
		
	<button type="submit" name="submit">Sign-up</button>

    <h3 style="text-align: center">OR</h3>


 

</form>
	<button onclick="document.getElementById('login').style.display='block'; document.getElementById('signup').style.display='none'" style="width:auto;">
    <p style="text-align: center">Login</p>
  </button>

</div>

    <script>
      // Get the modal
      var login = document.getElementById('login');
      var signup = document.getElementById('signup');
      signup.style.display = "none";

    </script>
  </body> 

</html>