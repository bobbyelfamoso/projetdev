console.log("Le script chargé");
var body = document.body;
body.style.opacity = 0;
body.style.transition = "opacity 1.2s ease-in-out";

window.addEventListener("load", () => {
    console.log("fade in lancé");
    body.style.opacity = 1;
});
