const overlayFollowsDialog = document.getElementById('overlayFollowsDialog')
const followsDialog = document.getElementById('followsDialog')

function followsDialogBtn() {
    overlayFollowsDialog.style.opacity = '0.5'
    overlayFollowsDialog.style.pointerEvents = 'auto'

    followsDialog.style.opacity = '1'
    followsDialog.style.pointerEvents = 'auto'
}

function cancelFollowsDialogBtn() {
    overlayFollowsDialog.style.opacity = '0'
    overlayFollowsDialog.style.pointerEvents = 'none'

    followsDialog.style.opacity = '0'
    followsDialog.style.pointerEvents = 'none'
}