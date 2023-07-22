<!DOCTYPE html>
<html id="html" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- IMPORT => FONT POPPINS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    {{-- IMPORT TAILWIND APP CSS --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
    textarea {
        resize: none;
    }
</style>
<body class="font-poppins dark:bg-slate-950 dark:text-white">
    @yield('main')
    <script src="/js/main.js"></script>
    @auth
    <script>
        $(document).ready(function() {
            // AJAX POST
            $('form[id^="likePostForm"]').on('submit', function(event) {
                event.preventDefault();
                var form = $(this);
                var postId = form.attr('id').replace('likePostForm', ''); // Mendapatkan id dari elemen form
                $.ajax({
                    url: '/like-post/' + postId, // Menggunakan id dalam URL
                    data: form.serialize(),
                    method: 'POST',
                });
            });

            // AJAX FOLLOW USER
            $('form[id^="followUserForm"]').on('submit', function(event) {
                event.preventDefault();
                var form = $(this);
                var followUserId = form.attr('id').replace('followUserForm', ''); // Mendapatkan id dari elemen form
                $.ajax({
                    url: '/follow-user/' + followUserId, // Menggunakan id dalam URL
                    data: form.serialize(),
                    method: 'POST',
                });
            });
        });
    </script>
    @endauth
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    {{-- COMPONENTS LEBIH DARI SATU KOMPONEN --}}
    <script src="/js/components/post.js"></script>
    <script src="/js/search-profile/mainFollowBtns.js"></script>
    {{-- TRIX EDITOR --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
</body>
</html>