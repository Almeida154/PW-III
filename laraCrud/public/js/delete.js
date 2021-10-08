const deleteIcons = document.querySelectorAll(".deleteIcon");

deleteIcons.forEach((deleteIcon) => {
    deleteIcon.addEventListener("click", (e) => {
        let id = e.target.getAttribute("key");
        window.location = `http://localhost:8000/contacts/delete/${id}`;
    });
});
