var elem = document.getElementById("email");
var elem2 = document.getElementById("message");
var elem3 = document.getElementById("comptagenum");

var nom = document.getElementById("full-name");
var sujet = document.getElementById("subject");
var form = document.querySelector(".contact-form");

// anim pour email en vert si > 10 et en rouge si moins
elem.addEventListener("input", () => {
    if (elem.value.length > 10) {
        elem.style.border = "2px solid #9ccc65";
    }
    else {
        elem.style.border = "2px solid red";
    }
})

// anim pour le compteur de caracteres
elem2.addEventListener("input", () => {
    if (elem3) {
        elem3.textContent = elem2.value.length;
    }
})

// anim pour message en vert si > 120 et en rouge si moins
elem2.addEventListener("input", () => {
    if (elem2.value.length > 120) {
        elem2.style.border = "2px solid red";
    }
    else {
        elem2.style.border = "2px solid #9ccc65";
    }
})

// anim pour le formulaire en rouge si un champ est vide
if (form) {
    form.addEventListener("submit", (e) => {
        var estValide = true;
        var champs = [nom, elem, sujet, elem2];

        champs.forEach(champ => {
            if (!champ.value.trim()) {
                champ.style.border = "2px solid red";
                estValide = false;
            }
        });
        // shake animation si le formulaire est invalide
        if (!estValide) {
            e.preventDefault();
            form.animate([
                { transform: "translateX(0)" },
                { transform: "translateX(-10px)" },
                { transform: "translateX(10px)" },
                { transform: "translateX(-10px)" },
                { transform: "translateX(10px)" },
                { transform: "translateX(0)" }
            ], {
                duration: 400,
                iterations: 1
            });
        }
    });
}