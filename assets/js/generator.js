document.addEventListener("DOMContentLoaded", function () {

    const lengthRange = document.getElementById("lengthRange");
    const lengthValue = document.getElementById("lengthValue");
    const generateBtn = document.getElementById("generateBtn");
    const generatedPassword = document.getElementById("generatedPassword");
    const copyBtn = document.getElementById("copyBtn");

    const includeUpper = document.getElementById("includeUpper");
    const includeLower = document.getElementById("includeLower");
    const includeNumbers = document.getElementById("includeNumbers");
    const includeSymbols = document.getElementById("includeSymbols");

    // تحديث قيمة الطول
    lengthRange.addEventListener("input", function () {
        lengthValue.textContent = lengthRange.value;
    });

    // دالة توليد كلمة المرور
    function generatePassword() {

        let characters = "";

        if (includeUpper.checked) characters += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if (includeLower.checked) characters += "abcdefghijklmnopqrstuvwxyz";
        if (includeNumbers.checked) characters += "0123456789";
        if (includeSymbols.checked) characters += "!@#$%^&*()_+[]{}<>?";

        if (!characters) {
            alert("Please select at least one option.");
            return;
        }

        let password = "";
        for (let i = 0; i < lengthRange.value; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            password += characters[randomIndex];
        }

        generatedPassword.value = password;
    }

    generateBtn.addEventListener("click", generatePassword);

    // نسخ إلى الحافظة
    copyBtn.addEventListener("click", function () {
        navigator.clipboard.writeText(generatedPassword.value);
    });

});