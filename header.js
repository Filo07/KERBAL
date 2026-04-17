let isToggled = true;
 
function toggles() {
    const headerbutton = document.getElementById("headerbutton");
    const header = document.querySelector("header");
         if (!isToggled) {
            header.style.top = "-152px";
        } else {
            header.style.top = "0px";
        }
        isToggled = !isToggled;
}
 

 