document.body.style.opacity = "0";

function fadeIn() {
    console.log("Animation de fondu lancée ! 🍵");
    document.body.style.transition = "opacity 1.5s ease-in-out";
    document.body.style.opacity = "1";
}

if (document.readyState === "complete") {
    fadeIn();
} else {
    window.addEventListener("load", fadeIn);
}
