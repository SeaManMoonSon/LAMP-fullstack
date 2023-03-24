function openCreateForm() {
    let createForm = document.getElementById("createForm");
    let addBtn = document.getElementById("addPage");

    if (createForm.style.display === "none") {
        createForm.style.display = "block";
        addBtn.textContent = "Close creation form";
    } else {
        createForm.style.display = "none";
        addBtn.textContent = "Add new page";
    }
}