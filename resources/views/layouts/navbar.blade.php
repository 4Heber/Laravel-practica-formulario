<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center align-items-center mb-md-0">
{{--    <li><a href="{{ route('/') }}" class="nav-link px-2 text-secondary">Home</a></li>--}}
    <li><a href="{{ route('post.index') }}" class="nav-link px-2 text-white">Posts</a></li>
    <li><a href="#" class="nav-link px-2 text-white">About</a></li>

    <!-- route('posts.create') -->
    <a href="{{ route('posts.create') }}" class="ms-5 btn btn-outline-warning">Publicar nuevo post</a>

    <p class="fst-italic text-center text-light fs-6 ms-5">DWES - UD6 Práctica formularios</p>
</ul>
