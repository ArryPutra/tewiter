$(document).ready(function() {
    $('#addPost').on('submit', function(event) {
        event.preventDefault();
        jQuery.ajax({
            url:"/ajax-upload",
            data:jQuery('#addPost').serialize(),
            method:'post',
        });
    });
});