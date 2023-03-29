function toggleSettings() {
    let settingsForm = document.getElementById("settingsForm");

    if (settingsForm.style.display === "none") {
        settingsForm.style.display = "block";
    } else {
        settingsForm.style.display = "none";
    }
}