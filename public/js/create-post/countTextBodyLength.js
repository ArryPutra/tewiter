const body = document.getElementById('body')
const countBodyTextLenght = document.getElementById('countTextBodyLenght')

let countText = body.value.length
countBodyTextLenght.textContent = countText + "/999"
if(countText > 999) {
    countBodyTextLenght.style.color = 'rgb(224 36 36)'
} else {
    countBodyTextLenght.style.color = ''
}
body.addEventListener('input', function() {
    let countText = body.value.length
    countBodyTextLenght.textContent = countText + "/999"
    if(countText > 999) {
        countBodyTextLenght.style.color = 'rgb(224 36 36)'
    } else {
        countBodyTextLenght.style.color = ''
    }
})