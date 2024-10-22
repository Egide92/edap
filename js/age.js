function validateAge() {
    const ageInput = document.getElementById("age");
    const age = parseInt(ageInput.value, 10);
    const errorMessage = document.getElementById("error-message");

    // Vérification si l'âge est un nombre entre 10 et 25
    if (isNaN(age) || age < 10 || age > 25) {
        errorMessage.textContent = "L'âge doit être un nombre entre 10 et 25.";
        ageInput.classList.add("error"); // Ajoute une classe d'erreur
    } else {
        errorMessage.textContent = ""; // Efface le message d'erreur
        ageInput.classList.remove("error"); // Retire la classe d'erreur
    }
}