<?php
require_once 'sesion_starter.php';
require_once 'dbh.inc.php';
?>

<!DOCTYPE html>

<html>

<head>

<script src="js/draggable_box.js"></script>
</head>
<body>
 <?php
 
//tre sa ma folosesc de asta
$selected_user =$_POST["Username_of_users"]; 

//variabila asta o folosesti in includes/chat_message.php ca sa iti iei Id-ul lui friend 
$_SESSION['Username_of_users'] = $selected_user;

$session_user = $_SESSION["Username"];

 
echo "<div id='user_permissions_box' class='user_permissions_box'>";
echo "<div id='selected_user' class='selected_user'>Click here to move</div>
<p>Move</p>
   <p>this</p>
   <p>DIV</p>
 </div>";
?>

<script>
//Make the DIV element draggagle:
dragElement(document.getElementById("mydiv"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>


</body>
</html>
