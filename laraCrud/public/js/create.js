const form = document.querySelector("#createContactForm");
const { cnttname, cnttnumber } = form;

form.onsubmit = (e) => {
    e.preventDefault();

    if (cnttname.value != "" && cnttnumber.value != "") {
        if (cnttnumber.value.length == 15) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "http://localhost:8000/new/contact",
                type: "POST",
                dataType: "json",
                data: JSON.stringify({
                    name: cnttname.value,
                    number: cnttnumber.value,
                }),
                success: (response) => {
                    response
                        ? sweetAlert(`Success!`, true)
                        : sweetAlert(`Error, try later!`, true);
                },
            });
            form.reset();
            return;
        }
        sweetAlert(`Phone invalid!`, false);
        return;
    }
    sweetAlert(`Don't forget any field!`, false);
};

$("#phoneMask").mask("(00) 00000-0000");

const Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

function sweetAlert(title, status) {
    Toast.fire({ icon: status ? "success" : "error", title: title });
}
