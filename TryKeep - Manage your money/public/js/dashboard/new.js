
import { sweetAlert, currencyMask } from '../functions/util.js'

const activeNavigation = document.querySelectorAll('.container-navigation')[2]
activeNavigation.classList.add('activeContainer')

currencyMask($('#amount'))

// New

$('#addForm').submit(e => {
    e.preventDefault()
    const { title, amount, description } = addForm
        $('#hiddenAmount').val(
        parseFloat(amount.value.slice(3).replace(/\./g, '').replace(',', '.'))
    )
    if ([title, amount, description].every(input => input.value != '')) {
        $.ajax({
            url: 'new/newMM',
            type: 'post',
            data: $('#addForm').serialize(),
            success: response => {
                if (response == 'empty') return sweetAlert(`Don't forget any field`, false)
                sweetAlert('Added!', true)
                $('#addForm').trigger('reset');
            }
        })
        return
    }
    sweetAlert(`Don't forget any field`, false)
})