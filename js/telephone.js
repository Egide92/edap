function validatePhoneNumber() {
    const phoneInput = document.getElementById("phone");
    const errorMessage = document.getElementById("error-message");
    const phonePattern = /^\d{10}$/; // Regex pour 10 chiffres

    // Vérification si le numéro de téléphone correspond au format
    if (!phonePattern.test(phoneInput.value)) {
        errorMessage.textContent = "Le numéro de téléphone doit contenir exactement 10 chiffres.";
        phoneInput.classList.add("error"); // Ajoute une classe d'erreur
    } else {
        errorMessage.textContent = ""; // Efface le message d'erreur
        phoneInput.classList.remove("error"); // Retire la classe d'erreur
    }
}