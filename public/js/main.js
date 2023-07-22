// MENGECEK APAKAH ADA 'darkModeActive' PADA LOCAL STORAGE
if(localStorage.getItem('darkModeActive')) {
html.classList.add(localStorage.getItem('darkModeActive'))
}
