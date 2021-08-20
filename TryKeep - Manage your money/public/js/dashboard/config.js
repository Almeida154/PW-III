
import { sweetAlert } from '../functions/util.js'

const activeNavigation = document.querySelectorAll('.container-navigation')[3]
activeNavigation.classList.add('activeContainer')

// Update

$('#updateForm').submit(e => {
    e.preventDefault()
    const { name, email, password } = updateForm
    if ([name, email, password].every(input => input.value != '')) {
        $.ajax({
            url: 'config/update',
            type: 'post',
            data: $('#updateForm').serialize(),
            success: response => sweetAlert('Account updated!', true)
        })
        return
    }
    sweetAlert(`Don't forget any field`, false)
})

// Delete

$('#btnDelete').click(e => {
    let url = '//localhost/PW-III/TryKeep - Manage your money/public/signIn'
    $.ajax({
        url: 'config/delete',
        type: 'post',
        success: () => window.location.href = url
    })
})