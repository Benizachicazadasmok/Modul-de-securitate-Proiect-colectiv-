<?php
include 'includes/sesion_starter.php';
include 'includes/get_user_permissions.php';
include 'includes/get_users.php';
include 'includes/get_projects.php';
include 'includes/get_roles.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="">

  <link href="css/sidenav.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/menu.css" rel="stylesheet">
  <link href="css/create_project_form.css" rel="stylesheet">
  <link href="css/project_buttons.css" rel="stylesheet">
  <link href="css/project_form.css" rel="stylesheet">
  <link href="css/gantt.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="js/sidenav.js"></script>
  <script src="js/dropdown.js"></script>
  <script src="js/select_user.js"></script>
  <script src="js/draggable_box.js"></script>
  <script src="js/delete_useless_stuff.js"></script>
  <script src="js/show-hide_create_project_form.js"></script>
  <script src="js/gantt.js"></script>
  <script src="js/calendar.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/484df5253e.js"></script>
  <script src="https://www.bootstrap-year-calendar.com/download/v1.1.0/bootstrap-year-calendar.min.js"></script>

</head>

<body>
  <nav class="main-menu">
    <ul>
      <li> <a onclick="openTab(event, 'Home')" id="defaultOpen">
          <i class="fa fa-home fa-2x"></i>
          <span class="nav-text">
            Home
          </span>
        </a>
      </li>

      <li class="has-subnav">
        <a class="dropdown-btn">
          <i class="fa fa-laptop fa-2x"></i>
          <span class="nav-text">
            Stars Components
            <i class="fa fa-caret-down" style="padding-top:10px;"></i>
          </span>
          <div class="dropdown-container">
            <a> <button class="tablinks" id="HTML" onclick="openTab(event, 'HTML & Javascript')"><i class="fa fa-html5 fa-2x"></i>HTML</button></a>
            <a> <button class="tablinks" id="NodeJS" onclick="openTab(event, 'NodeJS')"><i class="fa fa-file-code-o fa-2x"></i>NodeJS</button></a>
            <a> <button class="tablinks" id="PHP" onclick="openTab(event, 'PHP')"><i class="fa fa-file-text fa-2x"></i>PHP</button></a>
            <a> <button class="tablinks" id="SQL" onclick="openTab(event, 'SQL')"><i class="fa fa-database fa-2x"></i>SQL</button></a>
            <a> <button class="tablinks" id="C" onclick="openTab(event, 'C')"><i class="fa fa-desktop fa-2x"></i>C</button></a>
            <a> <button class="tablinks" id="C++" onclick="openTab(event, 'C++')"><i class="fa fa-desktop fa-2x"></i>C++</button></a>
            <a> <button class="tablinks" id="C#" onclick="openTab(event, 'C#')"><i class="fa fa-desktop fa-2x"></i>C#</button></a>
            <a> <button class="tablinks" id="Java" onclick="openTab(event, 'Java')"><i class="fa fa-desktop fa-2x"></i>Java</button></a>
            <a> <button class="tablinks" id="Python" onclick="openTab(event, 'Python')"><i class="fa fa-desktop fa-2x"></i>Python</button></a>
            <a> <button class="tablinks" id="CLISP" onclick="openTab(event, 'CLISP')"><i class="fa fa-code fa-2x"></i>CLISP</button></a>
            <a> <button class="tablinks" id="Prolog" onclick="openTab(event, 'Prolog')"><i class="fa fa-code fa-2x"></i>Prolog</button></a>
            <a> <button class="tablinks" id="Bash" onclick="openTab(event, 'Bash')"><i class="fa fa-terminal fa-2x"></i>Bash</button></a>
            <a> <button class="tablinks" id="Matlab" onclick="openTab(event, 'Matlab')"><i class="fa fa-area-chart fa-2x"></i>Matlab</button></a>
          </div>
        </a>
      </li>

      <li class="has-subnav">
        <a onclick="openTab(event, 'Tasks')">
          <i class="fa fa-tasks fa-2x"></i>
          <span class="nav-text">
            Tasks
          </span>
        </a>

      </li>
      <li class="has-subnav">
        <a onclick="openTab(event, 'Projects')">
          <i class="fa fa-folder-open fa-2x"></i>
          <span class="nav-text">
            Projects
          </span>
        </a>
      </li>

      <li>
        <a onclick="openTab(event, 'Statistics')">
          <i class="fa fa-bar-chart-o fa-2x"></i>
          <span class="nav-text">
            Graphs and Statistics
          </span>
        </a>
      </li>

      <li>
        <a onclick="openTab(event, 'Calendar')">
          <i class="fa fa-calendar fa-2x"></i>
          <span class="nav-text">
            Calendar
          </span>
        </a>
      </li>


      <li>
        <a onclick='openTab(event, "About_you")'>
          <i class="fa fa-user fa-2x"></i>
          <span class="nav-text">
            Profile
          </span>
        </a>
      </li>
      <div id="admin_only" style="display: none;">
        <li>
          <a onclick='openTab(event, "admin_users")'>
            <i class="fa fa-users fa-2x"></i>
            <span class="nav-text">
              Users control pannel
            </span>
          </a>
        </li>
        <li>
          <a onclick='openTab(event, "admin_projects")'>
            <i class="fa fa-tachometer fa-2x"></i>
            <span class="nav-text">
              Status Projects
            </span>
          </a>
        </li>
      </div>
      <div id="pm_only" style="display: none;">
        <li>
          <a onclick='openTab(event, "pm_project_dashboard")'>
            <i class="fa fa-cogs fa-2x"></i>
            <span class="nav-text">
              Projects control pannel
            </span>
          </a>
        </li>
        <li>
          <a onclick='openTab(event, "pm_project_review")'>
            <i class="fa fa-tachometer fa-2x"></i>
            <span class="nav-text">
              Review Projects
            </span>
          </a>
        </li>
    </ul>

    <ul class="logout">
      <li>
        <a href="includes/sesion_destroyer.php">
          <i class="fa fa-power-off fa-2x"></i>
          <span class="nav-text">
            Logout
          </span>
        </a>
      </li>
    </ul>
  </nav>


  <!-- Main content -->
  <div class="area">

    <div id="Home" class="tabcontent">
      <h1>Home</h1>
      <hr><br>
      <h3>Welcome
        <?php
        echo $_SESSION["Username"] . ".";
        ?>
      </h3>
    </div>

    <div id="Projects" class="tabcontent">
      <h1>Projects</h1>
      <hr><br>
      <?php
      echo "
      <div class='table-wrapper'>
          <table class='fl-table'><thead>
               <tr>
                 <th>Project name</th>
                 <th>Date start</th>
                 <th>Date end</th>
                 <th>Project requirements</th>
                 <th>Project description</th>
                 <th>Project status</th>
               </tr>
               </thead>
               <tbody>";

      echo "<tr>";
      foreach ($projects as $project) {

        $Project_name = htmlspecialchars($project['Project_name']);
        $Date_start = htmlspecialchars($project['Date_start']);
        $Date_end = htmlspecialchars($project['Date_end']);
        $Project_requirements = htmlspecialchars($project['Project_requirements']);
        $Project_description = htmlspecialchars($project['Project_description']);
        $Project_status = htmlspecialchars($project['Project_status']);

        echo
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_name . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Date_start . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Date_end . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_requirements . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_description . "</td>",
        "<td style='padding-left:10px; padding-right:10px;'>" . $Project_status . "</td>",
        "</tr>";
      }
      echo "</table><tbody></div> <br><br>
    </div>";
      ?>
      <div id="Tasks" class="tabcontent">
        <h1>Tasks</h1>
        <hr><br>
        <div class="chart-wrapper">
          <ul class="chart-values">
            <li>sun</li>
            <li>mon</li>
            <li>tue</li>
            <li>wed</li>
            <li>thu</li>
            <li>fri</li>
            <li>sat</li>
          </ul>
          <ul class="chart-bars">
            <li data-duration="tue½-wed" data-color="#b03532">Task</li>
            <li data-duration="wed-sat" data-color="#33a8a5">Task</li>
            <li data-duration="sun-tue" data-color="#30997a">Task</li>
            <li data-duration="tue½-thu" data-color="#6a478f">Task</li>
            <li data-duration="mon-tue½" data-color="#da6f2b">Task</li>
            <li data-duration="wed-wed" data-color="#3d8bb1">Task</li>
            <li data-duration="thu-fri½" data-color="#e03f3f">Task</li>
            <li data-duration="mon½-wed½" data-color="#59a627">Task</li>
            <li data-duration="fri-sat" data-color="#4464a1">Task</li>
          </ul>
        </div>
      </div>

      <div id="Statistics" class="tabcontent">
        <h1>Timesheets</h1>
        <hr>
        <p>Waiting on projects for Timeseets.</p>
      </div>

      <div id="Calendar" class="tabcontent">
        <h1>Calendar</h1>
        <hr>
        <div id="calendar" class="calendar"></div>
      </div>

      <div id="admin_users" class="tabcontent">
        <h1>Users controll pannel</h1>
        <hr><br>


        <?php
        echo " <div class='table-wrapper'>
       <form action='includes/add-remove_users_permissions.php' method=post>
       <table class='fl-table'><thead>
               <tr>",
       //  "<th>Select user</th>",
                 "<th>User_Id</th>",
        //  "<th>Project_name</th>",
        //  "<th>Role_name</th>",
        "<th>Username</th>
                 <th>Email</th>
               </tr>
               </thead>
               <tbody>";

        echo "<tr>";
        foreach ($users as $user) {

          $User_Id = htmlspecialchars($user['User_Id']);
          // $Project_name = htmlspecialchars($user['Project_name']);
          // $Role_name = htmlspecialchars($user['Role_name']);
          $Username = htmlspecialchars($user['Username']);
          $Email = htmlspecialchars($user['Email']);

          echo
          // "<td style='padding-left:10px; padding-right:10px;'> <input type='checkbox' name='project[]' value='" . $Project_Id . "'> </td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $User_Id . "</td>",
          // "<td style='padding-left:10px; padding-right:10px;'>" . $Project_name . "</td>",
          // "<td style='padding-left:10px; padding-right:10px;'>" . $Role_name . "</td></tr>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Username . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Email . "</td></tr>";
        }
        echo "</table><tbody></div> <br><br>
       <ul class='wrapper'>

       <button type='submit' name='admin'>
        <li class='icon user_permissions'>
          <span class='tooltip'>System Administrator</span>
          <span>Admin</span>   
        </li>
        </button>

        <button type='submit' name='pm'>
        <li class='icon user_permissions'>
          <span class='tooltip'>Project Manager</span>
          <span>PM</span>   
        </li>
        </button>

        <button type='submit' name='wd '>
        <li class='icon user_permissions'>
          <span class='tooltip'>Web Development</span>
          <span>WD</span>   
        </li>
        </button>

        <button type='submit' name='bd'>
        <li class='icon user_permissions'>
          <span class='tooltip'>Backend Developer</span>
          <span>BD</i></span>   
        </li>
        </button>

        <button type='submit' name='dd'>
        <li class='icon user_permissions'>
          <span class='tooltip'>Desktop Developer</span>
          <span>DD</span>   
        </li>
        </button>

        <button type='submit' name='esd'>
        <li class='icon user_permissions'>
          <span class='tooltip'>Embeded System Developer</span>
          <span>ESD</span>   
        </li>
        </button>

        <button type='submit' name='osd'>
        <li class='icon user_permissions'>
          <span class='tooltip'>Operating System Developer</span>
          <span>OSD</span>   
        </li>
        </button>

        <button type='submit' name='ds'>
        <li class='icon user_permissions'>
          <span class='tooltip'>Data Scientist</span>
          <span>DS</span>   
        </li>
        </button>

        <button type='submit' name='delete'>
          <li class='icon delete'>
            <span class='tooltip'>Remove Permission</span>
            <span><i class='fa fa-times' style='font-size:30px;'></i></span>   
          </li>
          </button>

        </form>
       </ul>";
        ?>


        <button class="open-button_user_allocation" onclick="openAlocateForm()">Alocate users to projects</button>

        <div class="Alocate_form-popup" id="AlocateForm">
          <form action="includes/alocate_permissions-create_new_project.php" method="post" class="Alocate_form-container">
            <h1>Create a new project</h1>

            <?php

            echo "
      <label for='Project_Id'>Chose a project</label><br>
      <input list='project' name='Project'>
      <datalist id='project'>";

            foreach ($projects as $project) {
              $Project_Id = htmlspecialchars($project['Project_Id']);
              $Project_name = htmlspecialchars($project['Project_name']);

              echo "<option value='" . $Project_Id . "'>" . $Project_name . "</option>";
            }

            echo "</datalist><br><br>";


            echo "
      <label for='Username'>Select an user:</label><br>
      <input list='username' name='Username'>
      <datalist id='username'>";

            foreach ($users as $user) {
              $User_Id = htmlspecialchars($user['User_Id']);
              $Username = htmlspecialchars($user['Username']);

              echo "<option value='" . $User_Id . "'>" . $Username . "</option>";
            }

            echo " </datalist><br><br>";

            echo "
      <label for='Role'>Select a role:</label><br>
      <input list='role' name='Role'>
      <datalist id='role'>";

            foreach ($roles as $role) {
              $Role_Id = htmlspecialchars($role['Role_Id']);
              $Role_name = htmlspecialchars($role['Role_name']);

              echo "<option value='" . $Role_Id . "'>" . $Role_name . "</option>";
            }

            echo " </datalist><br><br>";
            ?>

            <label for="User_objections"><b>Project description</b></label>
            <input type="text" name="User_objections"><br>

            <button type="submit" name="alocate" class="btn">Alocate</button>
            <button type="button" class="btn cancel" onclick="closeAlocateForm()">Close</button>
          </form>
        </div>
      </div>

      <div id="admin_projects" class="tabcontent">
        <h1>Projects controll pannel</h1>
        <hr>
        <?php
        echo "<form action='includes/finish-delete_projects.php' method=post>
       <div class='table-wrapper'>
          <table class='fl-table'><thead>
               <tr>
                <th>Select project</th>
                 <th>Project Id</th>
                 <th>Project name</th>
                 <th>Date start</th>
                 <th>Date end</th>
                 <th>Project requirements</th>
                 <th>Project description</th>
                 <th>Project status</th>
               </tr>
               </thead>
               <tbody>";

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
          "<td style='padding-left:10px; padding-right:10px;'> <input type='checkbox' name='project[]' value='" . $Project_Id . "'> </td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Project_Id . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Project_name . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Date_start . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Date_end . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Project_requirements . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Project_description . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Project_status . "</td>",
          "</tr>";
        }
        echo "</table><tbody></div> <br><br>
        <ul class='wrapper'>

        <button type='submit' name='finished'>
          <li class='icon submit'>
            <span class='tooltip'>Project finished</span>
            <span><i class='fa fa-check' style='font-size:30px;'></i></span>   
          </li>
          </button>

          <button type='submit' name='delete'>
          <li class='icon delete'>
            <span class='tooltip'>Delete Project</span>
            <span><i class='fa fa-times' style='font-size:30px;'></i></span>   
          </li>
          </button>
          </form>
        </ul>";
        ?>



        <button class="open-button_create_project" onclick="openCreateForm()">Create new project</button>

        <div class="Create_form-container" id="CreateForm">
          <form action="includes/create_new_project.php" method="post" class="Create_form-container">
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

            <button type="submit" name="create" class="btn">Create</button>
            <button type="button" class="btn cancel" onclick="closeCreateForm()">Close</button>
          </form>
        </div>

      </div>

      <div id="pm_project_dashboard" class="tabcontent">


        <?php
        echo " <div class='table-wrapper'>
          <table class='fl-table'><thead>
               <tr>
                 <th>Project Id</th>
                 <th>Project name</th>
                 <th>Date start</th>
                 <th>Date end</th>
                 <th>Project requirements</th>
                 <th>Project description</th>
                 <th>Project status</th>
               </tr>
               </thead>
               <tbody>";

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
        echo "</table></thead></div>";
        ?>

        <button class="open-button_user_allocation" onclick="openAlocateForm()">Alocate users to projects</button>

        <div class="Alocate_form-popup" id="AlocateForm">
          <form action="includes/alocate_permissions-create_new_project.php" method="post" class="Alocate_form-container">
            <h1>Create a new project</h1>

            <?php

            echo "
              <label for='Project_Id'>Chose a project</label><br>
              <input list='project' name='Project'>
              <datalist id='project'>";

            foreach ($projects as $project) {
              $Project_Id = htmlspecialchars($project['Project_Id']);
              $Project_name = htmlspecialchars($project['Project_name']);

              echo "<option value='" . $Project_Id . "'>" . $Project_name . "</option>";
            }

            echo "</datalist><br><br>";


            echo "
            <label for='Username'>Select an user:</label><br>
            <input list='username' name='Username'>
            <datalist id='username'>";

            foreach ($users as $user) {
              $User_Id = htmlspecialchars($user['User_Id']);
              $Username = htmlspecialchars($user['Username']);

              echo "<option value='" . $User_Id . "'>" . $Username . "</option>";
            }

            echo " </datalist><br><br>";

            echo "
            <label for='Role'>Select a role:</label><br>
            <input list='role' name='Role'>
            <datalist id='role'>";

            foreach ($roles as $role) {
              $Role_Id = htmlspecialchars($role['Role_Id']);
              $Role_name = htmlspecialchars($role['Role_name']);

              echo "<option value='" . $Role_Id . "'>" . $Role_name . "</option>";
            }

            echo " </datalist><br><br>";
            ?>

            <label for="User_objections"><b>Project description</b></label>
            <input type="text" name="User_objections"><br>

            <button type="submit" name="alocate" class="btn">Alocate</button>
            <button type="button" class="btn cancel" onclick="closeAlocateForm()">Close</button>
          </form>
        </div>

        <button class="open-button_create_project" onclick="openCreateForm()">Create new project</button>

        <div class="Create_form-container" id="CreateForm">
          <form action="includes/create_new_project.php" method="post" class="Create_form-container">
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

            <button type="submit" name="create" class="btn">Create</button>
            <button type="button" class="btn cancel" onclick="closeCreateForm()">Close</button>
          </form>
        </div>

      </div>

      <div id="pm_project_review" class="tabcontent">

        <?php
        echo "<form action='includes/finish-delete_projects.php' method=post>
       <div class='table-wrapper'>
          <table class='fl-table'><thead>
               <tr>
                <th>Select project</th>
                 <th>Project Id</th>
                 <th>Project name</th>
                 <th>Date start</th>
                 <th>Date end</th>
                 <th>Project requirements</th>
                 <th>Project description</th>
                 <th>Project status</th>
               </tr>
               </thead>
               <tbody>";

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
          "<td style='padding-left:10px; padding-right:10px;'> <input type='checkbox' name='project[]' value='" . $Project_Id . "'> </td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Project_Id . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Project_name . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Date_start . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Date_end . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Project_requirements . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Project_description . "</td>",
          "<td style='padding-left:10px; padding-right:10px;'>" . $Project_status . "</td>",
          "</tr>";
        }
        echo "</table><tbody></div> <br><br>
        <ul class='wrapper'>

        <button type='submit' name='finished'>
          <li class='icon submit'>
            <span class='tooltip'>Project finished</span>
            <span><i class='fa fa-check' style='font-size:30px;'></i></span>   
          </li>
          </button>

          <button type='submit' name='delete'>
          <li class='icon delete'>
            <span class='tooltip'>Delete Project</span>
            <span><i class='fa fa-times' style='font-size:30px;'></i></span>   
          </li>
          </button>
          </form>
        </ul>";
        ?>

      </div>


      <!-- IDE -->
      <div>
        <div id="HTML & Javascript" class="tabcontent">
          <h3>HTML & Javascript</h3>
          <iframe id="HTML" src="https://www.jdoodle.com/html-css-javascript-online-editor/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="NodeJS" class="tabcontent">
          <h3>NodeJS</h3>
          <iframe id="NodeJS" src="https://www.jdoodle.com/execute-nodejs-online/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="PHP" class="tabcontent">
          <h3>PHP</h3>
          <iframe id="PHP" src="https://www.jdoodle.com/php-online-editor/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="SQL" class="tabcontent">
          <h3>SQL</h3>
          <iframe id="SQL" src="https://www.jdoodle.com/execute-sql-online/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="C" class="tabcontent">
          <h3>C</h3>
          <iframe id="C" src="https://www.jdoodle.com/c-online-compiler/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="C++" class="tabcontent">
          <h3>C++</h3>
          <iframe id="C++" src="https://www.jdoodle.com/online-compiler-c++/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="C#" class="tabcontent">
          <h3>C#</h3>
          <iframe id="C#" src="https://www.jdoodle.com/compile-c-sharp-online/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="Java" class="tabcontent">
          <h3>Java</h3>
          <iframe id="Java" src="https://www.jdoodle.com/online-java-compiler/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="Python" class="tabcontent">
          <h3>Python</h3>
          <iframe id="Python" src="https://www.jdoodle.com/python3-programming-online/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="CLISP" class="tabcontent">
          <h3>CLISP</h3>
          <iframe id="CLISP" src="https://www.jdoodle.com/execute-clisp-online/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="Prolog" class="tabcontent">
          <h3>Prolog</h3>
          <iframe id="Prolog" src="https://www.jdoodle.com/execute-prolog-online/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="Bash" class="tabcontent">
          <h3>Bash</h3>
          <iframe id="Bash" src="https://www.jdoodle.com/test-bash-shell-script-online/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>

        <div id="Matlab" class="tabcontent">
          <h3>Matlab</h3>
          <iframe id="Matlab" src="https://www.jdoodle.com/execute-octave-matlab-online/" onloadeddata="delete_useless_stuff()"></iframe>
        </div>
      </div>

      <!-- tre sa mai lucrez la profil -->
      <div id="About_you" class="tabcontent">

        <img src="img/Profile_pic.png" border=1px; style="width:300px; height:250px; position: relative;">
        <p>

          <?php

          echo "Username: " . $_SESSION["Username"] .
            "<br>" .
            "Email: " . $_SESSION["Email"];

          ?>

        </p>


      </div>
    </div>

    <!-- Scripts -->
    <script>
      document.getElementById("CreateForm").style.display = "none";
      document.getElementById("AlocateForm").style.display = "none";
    </script>

    <script>
      var get_user_permissions =
        "<?php

          $sql_users_permissions = " SELECT * FROM users_permissions WHERE User_Id = '" . $_SESSION['User_Id'] . "' ";

          $result_users_permissions = mysqli_query($conn, $sql_users_permissions);

          $user_permissions = mysqli_fetch_all($result_users_permissions, MYSQLI_ASSOC);

          mysqli_free_result($result_users_permissions);
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
      var get_user_role =
        "<?php

          $sql_role_permissions = " SELECT Role_Id FROM projects_users_allocation WHERE User_Id = '" . $_SESSION['User_Id'] . "' ";

          $result_role_permissions = mysqli_query($conn, $sql_role_permissions);

          $role_permissions = mysqli_fetch_all($result_role_permissions, MYSQLI_ASSOC);

          mysqli_free_result($result_role_permissions);
          foreach ($role_permissions as $role_permission) {
            $Role_Id = htmlspecialchars($role_permission['Role_Id']);
            echo $Role_Id;
          }
          echo $Role_Id;
          ?>";

      console.log("User role is:", get_user_role);

      if (get_user_role == 1) {
        document.getElementById("HTML").style.display = "block";
        document.getElementById("NodeJS").style.display = "block";
        document.getElementById("PHP").style.display = "block";
        document.getElementById("SQL").style.display = "block";
        document.getElementById("C").style.display = "block";
        document.getElementById("C++").style.display = "block";
        document.getElementById("C#").style.display = "block";
        document.getElementById("Java").style.display = "block";
        document.getElementById("Python").style.display = "block";
        document.getElementById("CLISP").style.display = "block";
        document.getElementById("Prolog").style.display = "block";
        document.getElementById("Bash").style.display = "block";
        document.getElementById("Matlab").style.display = "block";
      }


      if (get_user_role == 2) {
        document.getElementById("HTML").style.display = "block";
        document.getElementById("NodeJS").style.display = "block";
        document.getElementById("PHP").style.display = "block";
        document.getElementById("SQL").style.display = "block";
        document.getElementById("C").style.display = "block";
        document.getElementById("C++").style.display = "block";
        document.getElementById("C#").style.display = "block";
        document.getElementById("Java").style.display = "block";
        document.getElementById("Python").style.display = "block";
        document.getElementById("CLISP").style.display = "block";
        document.getElementById("Prolog").style.display = "block";
        document.getElementById("Bash").style.display = "block";
        document.getElementById("Matlab").style.display = "block";
      }

      if (get_user_role == 3) {
        document.getElementById("HTML").style.display = "block";
        document.getElementById("NodeJS").style.display = "none";
        document.getElementById("PHP").style.display = "none";
        document.getElementById("SQL").style.display = "none";
        document.getElementById("C").style.display = "none";
        document.getElementById("C++").style.display = "none";
        document.getElementById("C#").style.display = "none";
        document.getElementById("Java").style.display = "none";
        document.getElementById("Python").style.display = "none";
        document.getElementById("CLISP").style.display = "none";
        document.getElementById("Prolog").style.display = "none";
        document.getElementById("Bash").style.display = "none";
        document.getElementById("Matlab").style.display = "none";
      }

      if (get_user_role == 4) {
        document.getElementById("HTML").style.display = "none";
        document.getElementById("NodeJS").style.display = "block";
        document.getElementById("PHP").style.display = "block";
        document.getElementById("SQL").style.display = "block";
        document.getElementById("C").style.display = "none";
        document.getElementById("C++").style.display = "none";
        document.getElementById("C#").style.display = "none";
        document.getElementById("Java").style.display = "none";
        document.getElementById("Python").style.display = "none";
        document.getElementById("CLISP").style.display = "none";
        document.getElementById("Prolog").style.display = "none";
        document.getElementById("Bash").style.display = "none";
        document.getElementById("Matlab").style.display = "none";
      }
      if (get_user_role == 5) {
        document.getElementById("HTML").style.display = "none";
        document.getElementById("NodeJS").style.display = "none";
        document.getElementById("PHP").style.display = "none";
        document.getElementById("SQL").style.display = "none";
        document.getElementById("C").style.display = "block";
        document.getElementById("C++").style.display = "block";
        document.getElementById("C#").style.display = "block";
        document.getElementById("Java").style.display = "block";
        document.getElementById("Python").style.display = "block";
        document.getElementById("CLISP").style.display = "none";
        document.getElementById("Prolog").style.display = "none";
        document.getElementById("Bash").style.display = "none";
        document.getElementById("Matlab").style.display = "none";
      }
      if (get_user_role == 6) {
        document.getElementById("HTML").style.display = "none";
        document.getElementById("NodeJS").style.display = "none";
        document.getElementById("PHP").style.display = "none";
        document.getElementById("SQL").style.display = "none";
        document.getElementById("C").style.display = "block";
        document.getElementById("C++").style.display = "none";
        document.getElementById("C#").style.display = "none";
        document.getElementById("Java").style.display = "none";
        document.getElementById("Python").style.display = "none";
        document.getElementById("CLISP").style.display = "none";
        document.getElementById("Prolog").style.display = "none";
        document.getElementById("Bash").style.display = "none";
        document.getElementById("Matlab").style.display = "none";
      }
      if (get_user_role == 7) {
        document.getElementById("HTML").style.display = "none";
        document.getElementById("NodeJS").style.display = "none";
        document.getElementById("PHP").style.display = "none";
        document.getElementById("SQL").style.display = "none";
        document.getElementById("C").style.display = "block";
        document.getElementById("C++").style.display = "none";
        document.getElementById("C#").style.display = "none";
        document.getElementById("Java").style.display = "none";
        document.getElementById("Python").style.display = "none";
        document.getElementById("CLISP").style.display = "none";
        document.getElementById("Prolog").style.display = "none";
        document.getElementById("Bash").style.display = "block";
        document.getElementById("Matlab").style.display = "none";
      }
      if (get_user_role == 8) {
        document.getElementById("HTML").style.display = "none";
        document.getElementById("NodeJS").style.display = "none";
        document.getElementById("PHP").style.display = "none";
        document.getElementById("SQL").style.display = "none";
        document.getElementById("C").style.display = "none";
        document.getElementById("C++").style.display = "none";
        document.getElementById("C#").style.display = "none";
        document.getElementById("Java").style.display = "none";
        document.getElementById("Python").style.display = "none";
        document.getElementById("CLISP").style.display = "block";
        document.getElementById("Prolog").style.display = "block";
        document.getElementById("Bash").style.display = "none";
        document.getElementById("Matlab").style.display = "block";
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