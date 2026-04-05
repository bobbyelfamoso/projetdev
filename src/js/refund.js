var email = document.getElementById("email");
var description = document.getElementById("description");
var address = document.getElementById("address");
var order_id = document.getElementById("order-id");
var issue_type = document.getElementById("issue-type");
var form = document.querySelector(".report-form");

// anim pour email en vert si > 10 et en rouge si moins
if (email) {
    email.addEventListener("input", () => {
        if (email.value.length > 10) {
            email.style.border = "2px solid #9ccc65";
        }
        else {
            email.style.border = "2px solid red";
        }
    })
}

// anim pour description en vert si valide et en rouge si trop court ou trop long
if (description) {
    description.addEventListener("input", () => {
        if (description.value.length > 120 || description.value.length < 1) {
            description.style.border = "2px solid red";
        }
        else {
            description.style.border = "2px solid #9ccc65";
        }
    })
}

// anim pour le formulaire en rouge si un champ est vide
if (form) {
    form.addEventListener("submit", (e) => {
        var estValide = true;
        var champs = [email, description, address, order_id, issue_type];

        champs.forEach(champ => {
            if (champ && !champ.value.trim()) {
                champ.style.border = "2px solid red";
                estValide = false;
            }
        });

        // shake animation si le formulaire est invalide
        if (!estValide) {
            console.log("Formulaire invalide, shake lancé !");
            e.preventDefault();

            form.animate([
                { transform: "translateX(0)" },
                { transform: "translateX(-15px)" },
                { transform: "translateX(15px)" },
                { transform: "translateX(-15px)" },
                { transform: "translateX(15px)" },
                { transform: "translateX(0)" }
            ], {
                duration: 400,
                iterations: 1,
                easing: "ease-in-out"
            });
        }
    });
}