import './bootstrap';
document.addEventListener("DOMContentLoaded", function() {
    const openBtn = document.getElementById("openForm");
    const closeBtn = document.getElementById("closeForm");
    const formContainer = document.getElementById("articleForm");

    openBtn.addEventListener("click", function() {
        formContainer.style.right = "0"; // Fait apparaître le formulaire
    });

    closeBtn.addEventListener("click", function() {
        formContainer.style.right = "-50%"; // Cache à nouveau
        
    });
});
