var global_friend = "";
var global_response = "";

function select_user(Username) {

    $.ajax({
        type: "POST",
        url: "includes/allocate_user_permissions.php",
        data: {
            user: Username,
        },
        success: function(response) {
            console.log(Username);
            global_friend = Username;
            console.log(response);

            $("#user_permissions_box").empty();
            document.getElementById("selected_user").innerHTML = Username;
            document.getElementById("user_permissions_box").innerHTML = response;
        }
    });
}