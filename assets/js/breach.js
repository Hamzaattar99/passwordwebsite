document.getElementById("checkBtn").addEventListener("click", function () {

    const password = document.getElementById("passwordInput").value;
    const resultBox = document.getElementById("resultBox");

    if (!password) {
        resultBox.innerHTML = `
            <div class="alert alert-warning">
                Please enter a password
            </div>
        `;
        return;
    }

    resultBox.innerHTML = `
        <div class="text-center">
            <div class="spinner-border text-danger"></div>
        </div>
    `;

    fetch("config/check_breach.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ password: password })
    })
    .then(response => response.json())
    .then(data => {

        if (data.error) {
            resultBox.innerHTML = `
                <div class="alert alert-danger">
                    Error checking breach
                </div>
            `;
            return;
        }

        if (data.found) {
            resultBox.innerHTML = `
                <div class="alert alert-danger">
                    This password appeared ${data.count} times in data breaches.
                </div>
            `;
        } else {
            resultBox.innerHTML = `
                <div class="alert alert-success">
                    This password was NOT found in known breaches.
                </div>
            `;
        }

    })
    .catch(() => {
        resultBox.innerHTML = `
            <div class="alert alert-danger">
                Server connection failed.
            </div>
        `;
    });

});