const overlayFollowersDialog = document.getElementById('overlayFollowersDialog')
const followersDialog = document.getElementById('followersDialog')

function followersDialogBtn() {
    overlayFollowersDialog.style.opacity = '0.5'
    overlayFollowersDialog.style.pointerEvents = 'auto'

    followersDialog.style.opacity = '1'
    followersDialog.style.pointerEvents = 'auto'
}

function cancelFollowersDialogBtn() {
    overlayFollowersDialog.style.opacity = '0'
    overlayFollowersDialog.style.pointerEvents = 'none'

    followersDialog.style.opacity = '0'
    followersDialog.style.pointerEvents = 'none'
    
    const oldPreviewImage = document.getElementById('oldPreviewImage')
    const imagePreview = document.getElementById('imagePreview')
    imagePreview.src = oldPreviewImage.src
}