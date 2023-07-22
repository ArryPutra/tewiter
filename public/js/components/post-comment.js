function dropDownMenuBtnComment(commentId) {
    const postCommentDeleteBtn = document.getElementById('postCommentDeleteBtn' + commentId)

    postCommentDeleteBtn.classList.toggle('showPostCommentDeleteBtn')
    if(postCommentDeleteBtn.classList.contains('showPostCommentDeleteBtn')) {
        postCommentDeleteBtn.style.display = 'flex'
        postCommentDeleteBtn.style.pointerEvents = 'auto'
    } else if(!postCommentDeleteBtn.classList.contains('showPostCommentDeleteBtn')) {
        postCommentDeleteBtn.style.display = ''
        postCommentDeleteBtn.style.pointerEvents = ''
    }
}

function postCommentDeleteBtn(commentId) {
    const deleteCommentDialog = document.getElementById('deleteCommentDialog' + commentId)
    const overlayDeleteBtnDialog = document.getElementById('overlayDeleteBtnDialog' + commentId)
    
    overlayDeleteBtnDialog.style.opacity = '0.5'
    overlayDeleteBtnDialog.style.pointerEvents = 'auto'

    deleteCommentDialog.style.opacity = '1'
    deleteCommentDialog.style.pointerEvents = 'auto'
    deleteCommentDialog.classList.remove('scale-110')
    deleteCommentDialog.classList.add('scale-100')
}
function cancelDeleteCommentDialogBtn(commentId) {
    const deleteCommentDialog = document.getElementById('deleteCommentDialog' + commentId)
    const overlayDeleteBtnDialog = document.getElementById('overlayDeleteBtnDialog' + commentId)

    overlayDeleteBtnDialog.style.opacity = ''
    overlayDeleteBtnDialog.style.pointerEvents = ''
    
    deleteCommentDialog.style.opacity = ''
    deleteCommentDialog.style.pointerEvents = ''
    deleteCommentDialog.classList.remove('scale-100')
    deleteCommentDialog.classList.add('scale-110')
}