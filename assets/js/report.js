function runLocalAnalysis(password) {

    const lengthValue = document.getElementById("lengthValue");
    const entropyValue = document.getElementById("entropyValue");
    const strengthBar = document.getElementById("strengthBar");
    const aiScore = document.getElementById("aiScore");
    const chartCanvas = document.getElementById("charChart");

    if (!password) return;

    // ===== Length =====
    const length = password.length;
    lengthValue.textContent = length;

    // ===== Character Set Detection =====
    let charsetSize = 0;

    if (/[a-z]/.test(password)) charsetSize += 26;
    if (/[A-Z]/.test(password)) charsetSize += 26;
    if (/[0-9]/.test(password)) charsetSize += 10;
    if (/[^a-zA-Z0-9]/.test(password)) charsetSize += 32;

    // ===== Entropy Calculation =====
    const entropy = (length * Math.log2(charsetSize || 1)).toFixed(2);
    entropyValue.textContent = entropy;

    // ===== Strength Level =====
    let label = "Weak";

    if (entropy >= 70) {
        label = "Strong";
    } else if (entropy >= 40) {
        label = "Medium";
    }

    aiScore.textContent = label;

    // ===== Strength Bar =====
    let strengthPercent = Math.min((entropy / 100) * 100, 100);

    strengthBar.style.width = strengthPercent + "%";
    strengthBar.textContent = Math.round(strengthPercent) + "%";

    strengthBar.classList.remove("bg-danger", "bg-warning", "bg-success");

    if (strengthPercent < 40) {
        strengthBar.classList.add("bg-danger");
    } else if (strengthPercent < 70) {
        strengthBar.classList.add("bg-warning");
    } else {
        strengthBar.classList.add("bg-success");
    }

    // ===== Character Distribution =====
    const charData = {
        lower: (password.match(/[a-z]/g) || []).length,
        upper: (password.match(/[A-Z]/g) || []).length,
        numbers: (password.match(/[0-9]/g) || []).length,
        symbols: (password.match(/[^a-zA-Z0-9]/g) || []).length
    };

    // ===== Chart Layout Fix =====
    const chartWrapper = chartCanvas.parentElement;

    chartWrapper.style.display = "flex";
    chartWrapper.style.justifyContent = "center";
    chartWrapper.style.alignItems = "center";
    chartWrapper.style.minHeight = "300px";

    chartCanvas.style.maxWidth = "800px";
    chartCanvas.style.width = "100%";
    chartCanvas.style.height = "400px";

    // ===== Chart.js Doughnut Chart =====
    new Chart(chartCanvas, {
        type: "doughnut",
        data: {
            labels: ["Lowercase", "Uppercase", "Numbers", "Symbols"],
            datasets: [{
                data: [
                    charData.lower,
                    charData.upper,
                    charData.numbers,
                    charData.symbols
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

}