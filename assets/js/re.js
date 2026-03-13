document.addEventListener("DOMContentLoaded", function () {

    const password = passwordFromPHP;

    console.log("Password:", passwordFromPHP);

    if (!password) return;

    const lengthValue = document.getElementById("lengthValue");
    const entropyValue = document.getElementById("entropyValue");
    const strengthBar = document.getElementById("strengthBar");
    const aiScore = document.getElementById("aiScore");
    const chartCanvas = document.getElementById("charChart");


    const controller = new AbortController();
    const signal = controller.signal;

    const timeoutLocalAnalysis = setTimeout(() => {

        console.log("30 seconds passed, aborting fetch and running local analysis");
        controller.abort();


        const script = document.createElement("script");
        script.src = "assets/js/report.js";
        script.onload = function () {
            runLocalAnalysis(password);

        };

        document.body.appendChild(script);
    }, 30000);






    fetch("api/analyze.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ password: password }),

        signal: signal
    })
    .then(res => res.json())
    .then(data => {

        clearTimeout(timeoutLocalAnalysis);

        if (data.error) {
            aiScore.textContent = "Analysis failed";
            return;
        }

        // ===== تحديث القيم =====
        lengthValue.textContent = data.features.length;
        entropyValue.textContent = data.entropy;

        aiScore.textContent = data.strength_label;

        // ===== حساب strength_percent ===== percent never used so I used entropy instead(remember to delete percent)
    // مثال تقديري: نأخذ طول الباسورد + تنوع الحروف + entropy
    let percent = 0;

    // طول الباسورد
    percent += Math.min(data.features.length * 4, 40); // max 40%

    // تنوع الحروف (uppercase, lowercase, digits, symbols)
    let diversity = 0;
    if (data.features.num_lower > 0) diversity += 15;
    if (data.features.num_upper > 0) diversity += 15;
    if (data.features.num_digits > 0) diversity += 15;
    if (data.features.num_special > 0) diversity += 15;

    percent += diversity;

    // entropy normalized (على سبيل المثال لو max entropy = 50)
    percent += Math.min((data.entropy / 50) * 30, 30);

    percent = Math.min(percent, 100); // تأكد أنه لا يتجاوز 100
    
        if(data.entropy >= 100)
        {
            data.entropy = 100;
        }


    // تحديث شريط القوة
    strengthBar.style.width = data.entropy + "%";
    strengthBar.textContent = Math.round(data.entropy) + "%";


        // حذف الألوان القديمة
        strengthBar.classList.remove("bg-danger","bg-warning","bg-success");

        if (data.entropy < 40) {
            strengthBar.classList.add("bg-danger");
        } else if (data.entropy < 70) {
            strengthBar.classList.add("bg-warning");
        } else {
            strengthBar.classList.add("bg-success");
        }



        // Constrain the canvas to avoid it growing beyond the page width.
    // Make the parent a flex container and center the canvas, set a
    // reasonable max width and explicit height (Chart.js needs an explicit
    // height when `maintainAspectRatio` is false).
    const chartCanvas = document.getElementById("charChart");
    const chartWrapper = chartCanvas.parentElement;
    chartWrapper.style.display = "flex";
    chartWrapper.style.justifyContent = "center";
    chartWrapper.style.alignItems = "center";
    chartWrapper.style.minHeight = "300px";

    chartCanvas.style.maxWidth = "800px"; // maximum visual width
    chartCanvas.style.width = "100%";     // responsive up to maxWidth
    chartCanvas.style.height = "400px";  // fixed height for the doughnut


        // ===== رسم Chart من البيانات الراجعة =====
        new Chart(chartCanvas, {
            type: "doughnut",
            data: {
                labels: ["Lowercase", "Uppercase", "Numbers", "Symbols"],
                datasets: [{
                    data: [
                        data.features.num_lower,
                        data.features.num_upper,
                        data.features.num_digits,
                        data.features.num_special
                    ],
                    backgroundColor: [
                        "#3b82f6",
                        "#22c55e",
                        "#f59e0b",
                        "#ef4444"
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: "#ffffff"
                        }
                    }
                }
            }
        });

    })
    .catch(err => {
       // console.error("Fetch error:", err)
        clearTimeout(timeoutLocalAnalysis);
        if(err.name == "AbortError")
        {
            console.log("Fetch aborted after 30 seconds");
        }
        else
        {
            console.log("Fetch: ", err);
        }



       // aiScore.textContent = "Connection failed";


        const script = document.createElement("script");
        script.src = "assets/js/report.js";

        script.onload = function () {
            runLocalAnalysis(password);
        };

        document.body.appendChild(script);
     });

});