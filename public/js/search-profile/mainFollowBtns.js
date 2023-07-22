const mainFollowBtns = document.querySelectorAll('.mainFollowBtn')

mainFollowBtns.forEach(function(mainFollowBtn) {
    const followedBtn = mainFollowBtn.children[0]
    const followBtn = mainFollowBtn.children[1]
    if(mainFollowBtn.classList.contains('followed')) {
        followedBtn.classList.remove('pointer-event-none')
        followedBtn.classList.remove('opacity-0')
        
        followBtn.classList.add('pointer-event-none')
        followBtn.classList.add('opacity-0')
    }
})

function mainFollowBtn(id) {
    const mainFollowBtn = document.getElementById('mainFollowBtn' + id)

    const followedBtn = mainFollowBtn.children[0]
    const followBtn = mainFollowBtn.children[1]

    if(mainFollowBtn.classList.contains('followed')) {
        followedBtn.classList.add('pointer-event-none')
        followedBtn.classList.add('opacity-0')

        followBtn.classList.remove('pointer-event-none')
        followBtn.classList.remove('opacity-0')

        mainFollowBtn.classList.remove('followed')
    } else {
        followedBtn.classList.remove('pointer-event-none')
        followedBtn.classList.remove('opacity-0')

        followBtn.classList.add('pointer-event-none')
        followBtn.classList.add('opacity-0')

        mainFollowBtn.classList.add('followed')
    }
}