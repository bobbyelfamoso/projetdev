var body = document.querySelector('body');
body.style.opacity = 0;
body.style.transition = "opacity 1.2s ease-in-out";
window.addEventListener("load", () => { body.style.opacity = 1; });


