
// Alert
const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

export function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

export function capitalizeAll(str) {
    return str.split(' ').map(capitalize).join(' ');
}

export function firstName(str) {
    return str.split(' ')[0];
}

export function sweetAlert(title, status) {
    Toast.fire({icon: status ? 'success' : 'error', title: title})
}

export function currencyMask(input) {
    input.maskMoney({
        prefix: 'R$ ',
        thousands: '.',
        decimal: ',',
    });
}