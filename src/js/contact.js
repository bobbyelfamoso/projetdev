var elem = document.getElementById("email");
var elem2 = document.getElementById("message");
var elem3 = document.getElementById("comptagenum");

elem.addEventListener("input", () => {
    if (elem.value.length > 10) {
        elem.style.border = "2px solid #9ccc65";
    }
    else {
        elem.style.border = "2px solid red";
    }

})
elem2.addEventListener("input", () => {
    if (elem3) {
        elem3.textContent = elem2.value.length;
    }
})


elem2.addEventListener("input", () => {
    if (elem2.value.length > 120) {
        elem2.style.border = "2px solid red";
    }
    else {
        elem2.style.border = "2px solid #9ccc65";
    }

})