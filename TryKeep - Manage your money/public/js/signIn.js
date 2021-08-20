
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
                if (response != -1) return window.location.href = 'dashboard'
                sweetAlert('User not found!', false)
            }
        })
        return
    }
    sweetAlert(`Don't forget any field!`, false)
}

// Forgot Password

$('#forgotPassword').click(e => forgot())

function forgot() {
    $.get('signIn/forgotPassword').done(response => {
        $('#helper').html(response)
        $('#back').click(() => back())
        $('#forgotForm').submit(e => forgotPassword(e))
    })
}

function forgotPassword(e) {
    e.preventDefault()
    const { email } = forgotForm
    if (email.value != '') {
        $.ajax({
            url: 'signIn/getPassword',
            type: 'post',
            data: $('#forgotForm').serialize(),
            success: response => {
                if (response == '-1') {
                    sweetAlert(`No accounts found`)
                    return
                }
                sweetAlert(`Email successfully sent`, true)
                return
            }
        })
        return
    }
    sweetAlert(`Fill in with your email`)
}

function back() {
    $.get('signIn').done(response => {
        $('#helper').html($(response).find('#helper').children())
        $('#signInForm').submit(e => signIn(e))
        $('#forgotPassword').click(e => forgot())
    })
}