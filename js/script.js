function openMenu() {
    // document.getElementById("menu").style.display = "flex"
    document.getElementById("ico-menu-on").style.display = "none"
    document.getElementById("ico-menu-off").style.display = "inline"
    document.getElementById("menu").style.transition = "all 1s"
    document.getElementById("menu").style.opacity = "1.0"
    // document.getElementById("menu").style.visibility = "visible"
    // document.getElementById("menu").style.height = "auto"
    // document.getElementById("menu").style.transform = "auto"
}
function closeMenu() {
    // document.getElementById("menu").style.display = "none"
    document.getElementById("ico-menu-on").style.display = "inline"
    document.getElementById("ico-menu-off").style.display = "none"
    document.getElementById("menu").style.transition = "all 1s"
    document.getElementById("menu").style.opacity = "0.0"
    // document.getElementById("menu").style.visibility = "hidden"
    // document.getElementById("menu").style.height = "0"
    // document.getElementById("menu").style.transform = "0"
}

var num
var menu = document.getElementById("menu1")
var modal = document.getElementById("myModal")
var span = document.getElementsByClassName("close")[0]

menu.onclick = function (event) {
    modal.style.display = "flex";
}

span.onclick = function (event) {
        modal.style.display = "none";
    }

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none"
    }
}