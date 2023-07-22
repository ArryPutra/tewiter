const overlayEditProfileDialog = document.getElementById('overlayEditProfileDialog')
const editProfileDialog = document.getElementById('editProfileDialog')

function editProfileBtn() {
    overlayEditProfileDialog.style.opacity = '0.5'
    overlayEditProfileDialog.style.pointerEvents = 'auto'

    editProfileDialog.style.opacity = '1'
    editProfileDialog.style.pointerEvents = 'auto'
}

function cancelEditProfileDialogBtn() {
    overlayEditProfileDialog.style.opacity = '0'
    overlayEditProfileDialog.style.pointerEvents = 'none'

    editProfileDialog.style.opacity = '0'
    editProfileDialog.style.pointerEvents = 'none'
    
    const oldPreviewImage = document.getElementById('oldPreviewImage')
    const imagePreview = document.getElementById('imagePreview')
    imagePreview.src = oldPreviewImage.src
}