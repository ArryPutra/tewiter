// GAMBAR DAN PANAH PROFILE
const myProfile = document.getElementById('myProfile')
// DROP DOWN MY PROFILE
const dropDownMyProfile = document.getElementById('dropDownMyProfile')
// BACKGROUND GELAP UNTUK DIALOG
const overlay = document.getElementById('overlay')

// MY PROFILE JIKA DI TEKAN
myProfile.onclick = function() {
    dropDownMyProfile.classList.toggle('dropDownMyProfileActive')
    if(dropDownMyProfile.classList.contains('dropDownMyProfileActive')) {
        dropDownMyProfile.style.opacity = '100'
        dropDownMyProfile.style.pointerEvents = 'auto';
    }
    if(!dropDownMyProfile.classList.contains('dropDownMyProfileActive')) {
        dropDownMyProfile.style.opacity = '0'
        dropDownMyProfile.style.pointerEvents = 'none';
    }
}

const deletePostDialog = document.getElementById('deletePostDialog')
const dropdownDivider = document.getElementById('dropdownDivider')
const overlayDeletePostDialog = document.getElementById('overlayDeletePostDialog')
// TOMBOL DELETE POST
function deletePostBtn() {
    // MEMUNCULKAN DELETE POST DIALOG
    deletePostDialog.style.opacity = '1'
    // MEMBUAT DELETE POST DIALOG DAPAT DITEKAN
    deletePostDialog.style.pointerEvents = 'auto'
    // MENGHILANGKAN DROP DOWN POST
    dropdownDivider.style.display = 'none'

    // MEMBERIKAN 1/2 OPACITY OVERLAY
    overlayDeletePostDialog.style.opacity = '0.5'
    // MEMBUAT OVERLAY MENJADI AUTO
    overlayDeletePostDialog.style.pointerEvents = 'auto'
}
// TOMVOL CANCEL DELETE POST
function cancelDeletePostDialogBtn() {
    // MENGHILANGKAN DELETE POST DIALOG
    deletePostDialog.style.opacity = '0'
    deletePostDialog.style.pointerEvents = 'none'

    // MENGHILANGAK OVERLAY DELETE POST DIALOG
    overlayDeletePostDialog.style.opacity = '0'
    overlayDeletePostDialog.style.pointerEvents = 'none'
    
    dropdownDivider.style.display = ''
}


const logoutDialog = document.getElementById('logoutDialog')
// LOGOUT BUTTON
function logoutBtn() {
    logoutDialog.style.opacity = '100'
    logoutDialog.style.pointerEvents = 'auto'
    logoutDialog.classList.remove('scale-110')
    
    // MEMBERIKAN BACKGROUND OVERLAY GELAP
    overlay.style.display = 'block'

    // MENGHAPUS DROP DOWN MY PROFILE
    dropDownMyProfile.classList.remove('dropDownMyProfileActive')
    dropDownMyProfile.style.opacity = '0'
    dropDownMyProfile.style.pointerEvents = 'none';
}
function logoutCancelBtn() {
    logoutDialog.style.opacity = '0'
    logoutDialog.style.pointerEvents = 'none'
    logoutDialog.classList.add('scale-110')

    // MENGHAPUS BACKGROUND OVERLAY GELAP
    overlay.style.display = ''
}