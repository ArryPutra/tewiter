// POP UP MENU BUTTON
function popUpMenuBtn() {
    // MEMBERIKAN TOGGLE CLASS BERNAMA "popUpMenuBtnActive" PADA TAG BODY
    document.body.classList.toggle('popUpMenuBtnActive')
    const arrowIcon = document.getElementById('arrowIcon')
    const xIcon = document.getElementById('xIcon')
    if(document.body.classList.contains('popUpMenuBtnActive')) {
        arrowIcon.style.top = '100%'
        xIcon.style.top = '30%'
        tweetPostBtn.style.bottom = '10rem'
        tweetPostBtn.style.pointerEvents = 'auto'
        tweetPostBtn.firstElementChild.style.opacity = '100'

        lightModeBtn.style.bottom = '6rem'
        lightModeBtn.style.pointerEvents = 'auto'
        lightModeBtn.firstElementChild.style.opacity = '100'
    } else {
        arrowIcon.removeAttribute('style')
        xIcon.removeAttribute('style')
        tweetPostBtn.removeAttribute('style')
        tweetPostBtn.firstElementChild.removeAttribute('style')
        lightModeBtn.removeAttribute('style')
        lightModeBtn.firstElementChild.removeAttribute('style')
    }
}

// TWEET BUTTON
const tweetPostBtn = document.getElementById('tweetPostBtn')

// GET LIGHT MODE BUTTON
const lightModeBtn = document.getElementById('lightModeBtn')
const lightIcon = document.getElementById('lightIcon')
const darkIcon = document.getElementById('darkIcon')
// CEK KONDISI APAKAH ADA STORAGE "darkModeActive"
if(localStorage.getItem('darkModeActive')) {
    lightModeBtn.firstElementChild.textContent = 'Dark Mode'
    
    lightIcon.style.opacity = '0'
    darkIcon.style.opacity = '1'
} else {
    lightModeBtn.firstElementChild.textContent = 'Light Mode'

    lightIcon.style.opacity = '1'
    darkIcon.style.opacity = '0'
}
// LIGHT MODE BUTTON DI KLIK
lightModeBtn.onclick = function() {
    const html = document.getElementById('html')
    html.classList.toggle('dark')
    if(html.classList.contains('dark')) {
        localStorage.setItem('darkModeActive', 'dark')
        lightModeBtn.firstElementChild.textContent = 'Dark Mode'
        // MENGUBAH ICON LIGHT MODE / DARK MODE
        lightIcon.style.opacity = '0'
        darkIcon.style.opacity = '1'
        
    } else {
        localStorage.setItem('darkModeActive', '')
        lightModeBtn.firstElementChild.textContent = 'Light Mode'
        lightIcon.style.opacity = '1'
        darkIcon.style.opacity = '0'
    }
}
