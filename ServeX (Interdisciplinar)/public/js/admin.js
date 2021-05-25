
// Tags input logic

let tags = []
let tagContainer = document.querySelector('.tag-container')
let form = document.querySelector('form')
let inptTag = form.querySelector('#inptTag')
let inptTechnicality = form.querySelector('#inptTechnicality')
let inptDescription = form.querySelector('#inptDescription')

inptTag.addEventListener('keyup', addTags)

function addTags(event) {
    // console.log(inptTag.value)
    const keyPressedIsEnter = event.key == 'Enter'
    if(keyPressedIsEnter) {
        // console.log(inptTag.value.split(','))
        inptTag.value.split(',').forEach(tag => {
            if(tag.trim().toString() != ''){
                if(tag) tags.push(capitalizeTag(tag.trim()))
            }
        })

        updateTags()
        isEmpty()
        inptTag.value = ''

    }
}

function updateTags(){
    clearTags()
    tags.slice().reverse().forEach(tag => {
        tagContainer.prepend(createTag(tag))
    })
}

function createTag(tag) {
    const div = document.createElement('div')
    div.classList.add('tag')

    const span = document.createElement('span')

    const i = document.createElement('i')
    i.classList.add('close')
    i.setAttribute('data-item', tag)
    i.onclick = removeTag

    span.innerHTML = tag
    div.append(span)
    div.append(i)

    return div
}

function removeTag(event) {
    const btnX = event.currentTarget
    const id = btnX.dataset.item
    const index = tags.indexOf(id)
    tags.splice(index, 1)

    updateTags()
    isEmpty()
}

function clearTags() {
    tagContainer
        .querySelectorAll('.tag')
        .forEach(tagElement => tagElement.remove())
}

function capitalizeTag(tag) {
    var separatedTag = tag.toLowerCase().split(' ')
    for(let i = 0; i < separatedTag.length; i++){
        separatedTag[i] 
            = separatedTag[i].charAt(0).toUpperCase()
            + separatedTag[i].substring(1)
    }
    return separatedTag.join(' ')
}

function isEmpty() {
    const h4 = document.querySelector('h4')
    if(tags.length < 1 || tags == null) h4.style.display = 'block' // has some value
    else h4.style.display = 'none' // is empty
}

isEmpty()

// The enter key aways submit a form, it is a problem

window.addEventListener('keydown', e => {
    if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
        if (e.target.nodeName == 'INPUT' && e.target.type == 'text') {
            e.preventDefault();
            return false;
        }
    }
}, true);

// Alert

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

// Validating the form

const validateForm = (inptTechnicality, inptDescription, tags) => {
    if(inptTechnicality.value == '') {
        Toast.fire({icon: 'error', title: 'Put some technicality!'})
        return false
    }
    if(inptDescription.value == '') {
        Toast.fire({icon: 'error', title: 'Put some description!'})
        return false
    }
    if(tags.length < 1 || tags == null) {
        Toast.fire({icon: 'error', title: 'Put some tag!'})
        return false
    }
    return true
}

// Getting the submit event

form.onsubmit = (event) => {

    event.preventDefault()
    
    if(validateForm(inptTechnicality, inptDescription, tags)) {
        $.ajax({
            url: '/create',
            type: 'post',
            dataType: 'json',
            data: JSON.stringify({
                technicality: inptTechnicality.value,
                description: inptDescription.value,
                tags: tags
            }),
            success: Toast.fire({
                icon: 'success',
                title: 'Technicality registered!'
            })
        })
        form.reset()
        tags.pop()
        clearTags()
    }
    isEmpty()
}