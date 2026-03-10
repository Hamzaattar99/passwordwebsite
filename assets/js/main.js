/* ==============================
   Navbar Background on Scroll
   ============================== */
/*window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".custom-navbar");
    if (window.scrollY > 50) {
        navbar.style.backgroundColor = "rgba(15, 23, 42, 1)";
    } else {
        navbar.style.backgroundColor = "rgba(15, 23, 42, 0.9)";
    }
}); */

/* ==============================
   Hero Input Focus Effect
   ============================== */
const heroInput = document.querySelector(".hero-input");
if (heroInput) {
    heroInput.addEventListener("focus", function () {
        heroInput.style.boxShadow = "0 0 10px rgba(59, 130, 246, 0.6)";
    });

    heroInput.addEventListener("blur", function () {
        heroInput.style.boxShadow = "none";
    });
}






/* ==============================
   Optional: AJAX Form Submission
      ============================== */


const passwordForm = document.getElementById("passwordForm");
if (passwordForm) {
    passwordForm.addEventListener("submit", function(e) {
        e.preventDefault();
        const password = heroInput.value.trim();
        if (!password) return;

        fetch("config/save_password.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: "password=" + encodeURIComponent(password)
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // إعادة توجيه المستخدم إلى صفحة report
                window.location.href = "report.php";
            } else {
                alert("حدث خطأ. حاول مرة أخرى.");
            }
        })
        .catch(err => console.error(err));
    });
}














     /* 
const passwordForm = document.getElementById("passwordForm");
if (passwordForm) {
    passwordForm.addEventListener("submit", function (e) {
        e.preventDefault(); // يمنع إعادة تحميل الصفحة

        const password = heroInput.value.trim();
        if (!password) return; // إذا فارغ لا نفعل شيء

        // مثال على إرسال البيانات عبر fetch إلى endpoint PHP أو Python
        fetch("report.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "password=" + encodeURIComponent(password),
        })
        .then(response => response.text())
        .then(data => {
            console.log("Response from server:", data);
            // لاحقًا: يمكن عرض النتيجة في صفحة Hero أو Redirect
        })
        .catch(error => console.error("Error:", error));
    });
} */