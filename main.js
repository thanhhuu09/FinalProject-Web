/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "310px";
}

/* Set the width of the side navigation to 0 */
function closeNav(){
    document.getElementById("mySidenav").style.width = "0px";
}

let check = false;

document.addEventListener("click", (evt) => {
    const flyoutElement = document.getElementById("user-info");
    let targetElement = evt.target; // clicked element  
    do {
        if (targetElement == flyoutElement) {
            // This is a click inside.
            if (!check) {
                check = true;
                document.getElementsByClassName("navbar-user-list")[0].style.display = 'block';
                return;
            }
            else if (check) {
                check = false;
                document.getElementsByClassName("navbar-user-list")[0].style.display = 'none';
                return;
            }
        }
        // Go up the DOM
        targetElement = targetElement.parentNode;
    } while (targetElement);
    
    // This is a click outside.
    check = false;
    document.getElementsByClassName("navbar-user-list")[0].style.display = 'none';
});