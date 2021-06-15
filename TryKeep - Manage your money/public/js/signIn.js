
import { sweetAlert } from './functions/util.js'

$(document).ready(() => {
    $('#signIn').addClass('active-link');
    $('#validatedForm').css('display', 'none')
})

$('#signInForm').submit(e => signIn(e))

function signIn(e) {
    e.preventDefault()
    const { email, password } = signInForm
    if ([email, password].every(input => input.value != '')) {
        $.ajax({
            url: 'signIn/validateSignIn',
            method: 'POST',
            data: $('#signInForm').serialize(),
            success: response => {
                if (response != -1) {
                    $('#idInput').val(response)
                    $('#validatedForm').submit()
                    return
                }
                sweetAlert('User not found!', false)
            }
        })
        return
    }
    sweetAlert(`Don't forget any field!`, false)
}