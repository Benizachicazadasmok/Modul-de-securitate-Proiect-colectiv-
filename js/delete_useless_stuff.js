function delete_useless_stuff() {
    var iframe = document.getElementById("frame");
    var nav = iframe.contentWindow.document.getElementsByTagName("nav")[0];
    var footer = iframe.contentWindow.document.getElementsByTagName("footer")[0];
    nav.style.display = "none";
    footer.style.display = "none";
}