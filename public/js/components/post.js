function dropDownMenuBtn(postId) {
    const dropDownMenuBtn = document.getElementById('dropDownMenuBtn' + postId)
    const dropDownMenu = document.getElementById('dropDownMenu' + postId)
    
    dropDownMenu.classList.toggle('showDropDownMenu')
    if(dropDownMenu.classList.contains('showDropDownMenu')) {
        dropDownMenu.style.display = 'block'
    } else if (!dropDownMenu.classList.contains('showDropDownMenu')) {
        dropDownMenu.style.display = ''
    }
}

function deletePostBtn(postId) {
    // MEMUNCULKAN OVERLAY
    let overlayDeletePostDialog = document.getElementById('overlayDeletePostDialog' + postId)
    overlayDeletePostDialog.style.opacity = '0.5'
    overlayDeletePostDialog.style.pointerEvents = 'auto'

    // MENAMPILKAN POST DIALOG
    let deletePostDialog = document.getElementById('deletePostDialog' + postId) 
    deletePostDialog.style.opacity = '1'
    deletePostDialog.style.pointerEvents = 'auto'
    deletePostDialog.classList.remove('scale-110')

    // MENGHILANGKAN DROP DOWN MENU
    let dropDownMenu = document.getElementById('dropDownMenu' + postId)
    dropDownMenu.style.display = 'none'
    dropDownMenu.classList.remove('showDropDownMenu')
}

function cancelDeletePostDialogBtn(postId) {
    // MENGHILANGKAN DELETE POST DIALOG
    let deletePostDialog = document.getElementById('deletePostDialog' + postId) 
    deletePostDialog.style.opacity = '0'
    deletePostDialog.style.pointerEvents = 'none'
    deletePostDialog.classList.add('scale-110')

    // MENGHILANGKAN OVERLAY DELETE POST DIALOG
    let overlayDeletePostDialog = document.getElementById('overlayDeletePostDialog' + postId)
    overlayDeletePostDialog.style.opacity = '0'
    overlayDeletePostDialog.style.pointerEvents = 'none'
}

const likePostIconTrueAll = document.querySelectorAll('.likePostIconTrue')
likePostIconTrueAll.forEach(function(likePostIconTrue) {
    const falseLikeIcon = likePostIconTrue.children[0]
    const trueLikeIcon = likePostIconTrue.children[1]

    // MUNCULKAN trueLikeIcon
    trueLikeIcon.style.opacity = '1'
    trueLikeIcon.style.pointerEvents = 'auto'
    trueLikeIcon.classList.remove('scale-0')
    trueLikeIcon.classList.add('scale-100')
    
    // HILANGKAN falseLikeIcon
    falseLikeIcon.style.opacity = '0'
    falseLikeIcon.style.pointerEvents = 'none'
})
function likePostBtn(postId) {
    // AMBIL TOMBOL MAIN LIKE POST ICON
    const mainLikePostIcon = document.getElementById('mainLikePostIcon' + postId)
    
    // BERIKAN CLASSLIST TOGGLE PADA MainLikePostIcon
    mainLikePostIcon.classList.toggle('likePostIconTrue')

    // AMBIL FALSE DAN LIKE ICON
    const falseLikeIcon = document.getElementById('falseLikeIcon' + postId)
    const trueLikeIcon = document.getElementById('trueLikeIcon' + postId)

    // AMBIL JUMLAH ANGKA LIKE
    const likePostNumber = document.getElementById('likePostNumber' + postId)
    // JIKA TOMBOL mainLikePostIcon TERDAPAT CLASSLIST BERNAMA likePostIconTrue
    if(mainLikePostIcon.classList.contains('likePostIconTrue')) {
        // MUNCULKAN trueLikeIcon
        trueLikeIcon.style.opacity = '1'
        trueLikeIcon.style.pointerEvents = 'auto'
        trueLikeIcon.classList.remove('scale-0')
        trueLikeIcon.classList.add('scale-100')
        
        // HILANGKAN falseLikeIcon
        falseLikeIcon.style.opacity = '0'
        falseLikeIcon.style.pointerEvents = 'none'

        // TAMBAHKAN JUMLAH LIKE
        likePostNumber.textContent = parseInt(likePostNumber.textContent) + 1
    } else if(!mainLikePostIcon.classList.contains('likePostIconTrue')) {
        // HILANGKAN trueLikeIcon
        trueLikeIcon.style.opacity = '0'
        trueLikeIcon.style.pointerEvents = 'none'
        trueLikeIcon.classList.remove('scale-100')
        trueLikeIcon.classList.add('scale-0')
        
        // MUNCULKAN falseLikeIcon
        falseLikeIcon.style.opacity = '1'
        falseLikeIcon.style.pointerEvents = 'auto'

        // KURANGKAN JUMLAH LIKE
        likePostNumber.textContent = parseInt(likePostNumber.textContent) - 1
    }
}

function copyPostUrl(url, postId) {
    var textToCopy = "http://127.0.0.1:8000/" + url; // Ganti dengan teks yang ingin Anda salin

    // Buat elemen textarea sementara
    var tempTextArea = document.createElement("input");
    tempTextArea.value = textToCopy;

    // Sembunyikan elemen textarea agar tidak mengganggu tampilan halaman
    tempTextArea.style.position = "fixed";
    tempTextArea.style.opacity = 0;

    // Tambahkan elemen textarea ke dalam dokumen
    document.body.appendChild(tempTextArea);

    // Pilih teks dalam textarea
    tempTextArea.select();

    // Salin teks ke clipboard
    document.execCommand("copy");

    // Hapus elemen textarea sementara
    document.body.removeChild(tempTextArea);

    // Berikan umpan balik kepada pengguna
    // MENGHILANGKAN DROP DOWN MENU
    let dropDownMenu = document.getElementById('dropDownMenu' + postId)
    dropDownMenu.style.display = 'none'
    dropDownMenu.classList.remove('showDropDownMenu')
}