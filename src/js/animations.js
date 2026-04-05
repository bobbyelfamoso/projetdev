const cartlogo = document.querySelector(".cart-icon");

cartlogo.addEventListener("mouseenter", () => {
    cartlogo.animate([{ transform: "rotate(0deg)" }, { transform: "rotate(360deg)" }], {
        duration: 1000,
        easing: "ease-in-out",
    });
});
