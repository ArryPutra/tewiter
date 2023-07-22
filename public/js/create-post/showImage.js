function chooseImageBtn() {
    const image = document.getElementById('image')
    const imagePreview = document.getElementById('imagePreview')

    const fileReader = new FileReader()

    fileReader.readAsDataURL(image.files[0])

    fileReader.onload = function(event) {
        imagePreview.src = event.target.result
        imagePreview.style.marginTop = '1.5rem'
        imagePreview.style.marginBottom = '1.5rem'
    }
}