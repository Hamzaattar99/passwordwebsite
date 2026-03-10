window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".custom-navbar");

    if (window.scrollY > 50) {
        navbar.style.backgroundColor = "rgba(15, 23, 42, 1)";
        navbar.classList.add("scrolled");
    } else {
        navbar.style.backgroundColor = "rgba(15, 23, 42, 0.9)";
        navbar.classList.remove("scrolled");
    }
});