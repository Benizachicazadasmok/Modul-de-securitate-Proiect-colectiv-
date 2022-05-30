<?php include 'includes/sesion_starter.php'; ?>
<?php include 'includes/get_users.php'; ?>
<?php include 'includes/get_user_permissions.php'; ?>
<?php include 'includes/get_projects.php'; ?>

<!DOCTYPE html>

<html>

<head>

  <title>Dashboard</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/sidenav.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/create_project_form.css" rel="stylesheet">

  <script src="js/sidenav.js"></script>
  <script src="js/dropdown.js"></script>
  <script src="js/select_user.js"></script>
  <script src="js/draggable_box.js"></script>
  <script src="js/delete_useless_stuff.js"></script>
  <script src="js/show-hide_create_project_form.js"></script>
</head>

<body>

  <!-- tre sa lucrez la asta -->
  <?php

  foreach ($user_permissions as $user_permissions) {
    $User_Id = htmlspecialchars($user_permissions['User_Id']);
    $Permission_Id = htmlspecialchars($user_permissions['Permission_Id']);
  }
  ?>


  <!-- Left menu -->
  <div class="sidenav">

    <img src="img/logo.png" style=" width:60px; height:60px; position: relative; padding-left: 10px;">
    <h3 style="color:white; position: relative; float: right; padding-right: 25px;"> Dashboard</h3>

    <hr>

    <a> <button class="tablinks" onclick="openTab(event, 'Home')" id="defaultOpen"> Home </button></a>
    <a><button class="tablinks" onclick="openTab(event, 'Feed')">Feed</button></a>
    <a><button class="tablinks" onclick="openTab(event, 'Projects')">Projects</button></a>

    <button class="dropdown-btn">Work overview
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a> <button class="tablinks" onclick="openTab(event, 'Tasks')">Tasks</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'Milestone')">Milestone</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'Timesheets')">Timesheets</button></a>
    </div>

    <button class="dropdown-btn">Tools
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a> <button class="tablinks" onclick="openTab(event, 'HTML & Javascript')">HTML & Javascript</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'NodeJS')">NodeJS</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'PHP')">PHP</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'SQL')">SQL</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'C')">C</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'C++')">C++</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'C#')">C#</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'Java')">Java</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'Python')">Python</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'CLISP')">CLISP</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'Prolog')">Prolog</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'Bash')">Bash</button></a>
      <a> <button class="tablinks" onclick="openTab(event, 'Matlab')">Matlab</button></a>
    </div>


    <div class="dropup">
      <button class="dropbtn">
        <img src="img/Profile.png" style=" width:70px; height:60px; position: relative; padding-left: 10px;">
      </button>

      <div class="dropup-content">
        <!-- nu e deloc safe, dar momentan merge -->
        <div id="admin_only" style="display: none;">
          <a> <button class='tablinks' onclick='openTab(event, "admin_users")'>Users Permissions </button> </a>
          <a> <button class='tablinks' onclick='openTab(event, "admin_projects")'> Project Permissions </button> </a>
        </div>

        <div id="pm_only" style="display: none;">

          <a> <button class='tablinks' onclick='openTab(event, "pm_project_dashboard")'>Project Dashboard </button> </a>
          <a> <button class='tablinks' onclick='openTab(event, "pm_project_review")'>Review Projects </button> </a>

        </div>

        <a> <button class='tablinks' onclick='openTab(event, "Profile")'>Profile</button></a>

        <div>
          <form action="includes/sesion_destroyer.php" method=post>
            <a href="Login.php"><button type="submit" name="exit">Logout</button></a>
          </form>
        </div>

      </div>
    </div>



  </div>

  <!-- right side content -->

  <div class="main">

    <div id="Home" class="tabcontent">
      <h3>Home</h3>
      <hr>
      <p>Welcome
        <?php
        echo $_SESSION["Username"] . ".";
        ?>

      </p>
    </div>

    <div id="Feed" class="tabcontent">
      <h3>Feed</h3>
      <p>Nothing yet.</p>
    </div>

    <div id="Projects" class="tabcontent">
      <h3>Projects</h3>
      <p>No projects are yet.</p>
    </div>

    <div id="Tasks" class="tabcontent">
      <h3>Tasks</h3>
      <p>Waiting for tasks.</p>
    </div>

    <div id="Milestone" class="tabcontent">
      <h3>Milestone</h3>
      <p>No milestones.</p>
    </div>

    <div id="Timesheets" class="tabcontent">
      <h3>Timesheets</h3>
      <p>Waiting on projects for Timeseets.</p>
    </div>



    <!-- IDE -->
    <div id="HTML & Javascript" class="tabcontent">
      <h3>HTML & Javascript</h3>
      <iframe id="frame" src="https://www.jdoodle.com/html-css-javascript-online-editor/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="NodeJS" class="tabcontent">
      <h3>NodeJS</h3>
      <iframe id="frame" src="https://www.jdoodle.com/execute-nodejs-online/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="PHP" class="tabcontent">
      <h3>PHP</h3>
      <iframe id="frame" src="https://www.jdoodle.com/php-online-editor/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="SQL" class="tabcontent">
      <h3>SQL</h3>
      <iframe id="frame" src="https://www.jdoodle.com/execute-sql-online/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="C" class="tabcontent">
      <h3>C</h3>
      <iframe id="frame" src="https://www.jdoodle.com/c-online-compiler/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="C++" class="tabcontent">
      <h3>C++</h3>
      <iframe id="frame" src="https://www.jdoodle.com/online-compiler-c++/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="C#" class="tabcontent">
      <h3>C#</h3>
      <iframe id="frame" src="https://www.jdoodle.com/compile-c-sharp-online/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="Java" class="tabcontent">
      <h3>Java</h3>
      <iframe id="frame" src="https://www.jdoodle.com/online-java-compiler/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="Python" class="tabcontent">
      <h3>Python</h3>
      <iframe id="frame" src="https://www.jdoodle.com/python3-programming-online/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="CLISP" class="tabcontent">
      <h3>CLISP</h3>
      <iframe id="frame" src="https://www.jdoodle.com/execute-clisp-online/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="Prolog" class="tabcontent">
      <h3>Prolog</h3>
      <iframe id="frame" src="https://www.jdoodle.com/execute-prolog-online/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="Bash" class="tabcontent">
      <h3>Bash</h3>
      <iframe id="frame" src="https://www.jdoodle.com/test-bash-shell-script-online/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <div id="Matlab" class="tabcontent">
      <h3>Matlab</h3>
      <iframe id="frame" src="https://www.jdoodle.com/execute-octave-matlab-online/" onloadeddata="delete_useless_stuff()"></iframe>
    </div>

    <!-- tre sa mai lucrez la profil -->
    <div id="Profile" class="tabcontent">

      <img src="img/Profile_pic.png" border=1px; style="width:300px; height:250px; position: relative;">
      <p>

        <?php

        echo "Username: " . $_SESSION["Username"] .
          "<br>" .
          "Email: " . $_SESSION["Email"];

        ?>

      </p>


    </div>

    <div id="admin_users" class="tabcontent">
      <h3>Dashboard</h3>
      <hr><br>


      <?php
      foreach ($users as $user) { ?>

        <h3>
          <?php

          $Username_of_users = htmlspecialchars($user['Username']);
          $_SESSION["Username_of_users"] = $Username_of_users;
          ?>

          <button class="user_button" onclick="select_user('<?php echo $Username_of_users ?>')">

          <?php

          echo  $_SESSION["Username_of_users"];
        }
          ?>
          </button>




        </h3>

        <div id="user_permissions" class="user_permissions_box">
          <div id="selected_user" class="selected_user"></div>
        </div>

    </div>


    <div id="admin_projects" class="tabcontent">

      <p>admin_projects</p>

    </div>

    <div id="pm_project_dashboard" class="tabcontent">


      <?php
      echo " <table style='text-align:center;'>
               <tr>
                 <th>Project Id</th>
                 <th>Project name</th>
                 <th>Date start</th>
                 <th>Date end</th>
                 <th>Project requirements</th>
                 <th>Project description</th>
                 <th>Project status</th>
               </tr>";

      echo "<tr>";
      foreach ($projects as $project) {

        $Project_Id = htmlspecialchars($project['Project_Id']);
        $Project_name = htmlspecialchars($project['Project_name']);
        $Date_start = htmlspecialchars($project['Date_start']);
        $Date_end = htmlspecialchars($project['Date_end']);
        $Project_requirements = htmlspecialchars($project['Project_requirements']);
        $Project_description = htmlspecialchars($project['Project_description']);
        $Project_status = htmlspecialchars($project['Project_status']);

        echo
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_Id . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_name . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Date_start . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Date_end . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_requirements . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_description . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_status . "</td></tr>";
      }
      echo "</table>";
      ?>

      <button class="open-button" onclick="openForm()">Create new project</button>

      <div class="form-popup" id="myForm">
        <form action="includes/create_new_project.php" method="post" class="form-container">
          <h1>Create a new project</h1>

          <label for="project_name"><b>Project name</b></label>
          <input type="text" name="project_name" required><br>

          <label for="date_start"><b>Date start</b></label>
          <input type="date" name="date_start" required><br>

          <label for="date_end"><b>Date end</b></label>
          <input type="date" name="date_end" required><br>

          <label for="project_requirements"><b>Project requirements</b></label>
          <input type="text" name="project_requirements" required><br>

          <label for="project_description"><b>Project description</b></label>
          <input type="text" name="project_description" required><br>

          <button type="submit" name="submit" class="btn">Create</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>

    </div>

    <div id="pm_project_review" class="tabcontent">

      <?php
      echo "<form action='test123.php' method=post>
       <table style='text-align:center;'>
               <tr>
                 <th>Project Id</th>
                 <th>Project name</th>
                 <th>Date start</th>
                 <th>Date end</th>
                 <th>Project requirements</th>
                 <th>Project description</th>
                 <th>Project status</th>
               </tr>";

      echo "<tr>";
      foreach ($projects as $project) {

        $Project_Id = htmlspecialchars($project['Project_Id']);
        $Project_name = htmlspecialchars($project['Project_name']);
        $Date_start = htmlspecialchars($project['Date_start']);
        $Date_end = htmlspecialchars($project['Date_end']);
        $Project_requirements = htmlspecialchars($project['Project_requirements']);
        $Project_description = htmlspecialchars($project['Project_description']);
        $Project_status = htmlspecialchars($project['Project_status']);

        echo
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_Id . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_name . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Date_start . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Date_end . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_requirements . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_description . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_status . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'> <input type='checkbox' name='project[]' value='" . $Project_name . "'> </td></tr>";
      }
      echo "</table> <button type='submit' name='submit'>Submit</button></form>";
      ?>

    </div>

  </div>



  <!-- Scripts -->

  <script>
    var get_user_permissions =
      "<?php
        require_once 'includes/dbh.inc.php';
        require_once 'includes/functions.inc.php';

        $user = $_SESSION["User_Id"];

        $sql = " SELECT * FROM users_permissions WHERE User_Id = '" . $_SESSION['User_Id'] . "' ";

        $result = mysqli_query($conn, $sql);

        $user_permissions = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);
        foreach ($user_permissions as $user_permissions) {
          $User_Id = htmlspecialchars($user_permissions['User_Id']);
          $Permission_Id = htmlspecialchars($user_permissions['Permission_Id']);
        }
        echo $Permission_Id;

        ?>";

    console.log("User permission is:", get_user_permissions);

    if (get_user_permissions == 0) {

      document.getElementById("admin_only").style.display = "block";

    }

    if (get_user_permissions == 1) {

      document.getElementById("pm_only").style.display = "block";

    }
  </script>

  <script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
  </script>

  <script>
    function openTab(evt, Tab_name) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(Tab_name).style.display = "block";
      evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
  </script>

</body>

</html>