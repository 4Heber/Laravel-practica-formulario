<x-app-layout>
    <x-slot name="title">Posts</x-slot>

    <x-slot name="header">
        <header class="p-3 text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                    </a>

                    @include('layouts.navbar')

                    <div class="d-flex justify-content-end">
                        @if (Route::has('login'))
                            @auth
                                <div class="pt-2 me-4 text-warning">{{ Auth::user()->name }}</div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline btn btn-outline-light me-2">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline btn btn-warning">Sign-up</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </header>
    </x-slot>

    <div class="p-4">
        <h2 class="text-light text-center fs-1">Editar post</h2>
    </div>

    <div class="container w-50 p-5 bg-dark rounded-2">
        <form action="{{ route('posts.update', $post) }}" method="post" class="form-floating">
            {{--Token CSRF--}}
            @csrf @method('PATCH')
            {{--Titulo del post--}}
            <div class="form-floating mb-4">
                <input type="text" class="form-control rounded-2" id="tituloPost" name="titulo" placeholder="#" value="{{ old('titulo', $post->titulo) }}" autofocus required>
                <label for="tituloPost">Título del post</label>
                @error('titulo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{--Extracto del post--}}
            <div class="form-floating mb-4">
                <input type="text" class="form-control rounded-2" id="extracto" placeholder="#" name="extracto" value="{{ old('extracto', $post->extracto) }}">
                <label for="extracto">Extracto</label>
                @error('extracto')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex">
                {{--Caducable checkbox--}}
                <div class="mb-4 me-4 form-check">
                    <input type="checkbox"
                           class="form-check-input"
                           name="caducable"
                           @checked(old('caducable', $post->caducable))
                    />
                    <label class="form-check-label text-light" for="exampleCheck1">Caducable</label>
                </div>
                {{--Comentable checkbox--}}
                <div class="mb-4 form-check">
                    <input type="checkbox"
                           class="form-check-input"
                           name="comentable"
                           @checked(old('comentable', $post->comentable))
                    />
                    <label class="form-check-label text-light" for="exampleCheck1">Comentable</label>
                </div>
            </div>

            {{--Contenido--}}
            <div class="form-floating mb-4">
                <textarea class="form-control rounded-2" placeholder="Contenido del post" id="floatingTextarea2" name="contenido" style="height: 300px" required>
                    {{ old('contenido', $post->contenido) }}
                </textarea>
                <label for="floatingTextarea2">Contenido del post ...</label>
                @error('contenido')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                {{--Acceso select--}}
                <div class="form-floating w-25">
                    <select class="form-select rounded-2" id="floatingSelect" name="acceso" aria-label="FloatingSelect" value="{{ old('acceso', $post->acceso) }}">
                        <option value="publico" selected>Público</option>
                        <option value="privado">Privado</option>
                    </select>
                    <label for="floatingSelect">Tipo de acceso</label>
                </div>

                {{--Submit button--}}
                <input class="btn btn-primary w-25" type="submit" value="Editar">
            </div>

        </form>
    </div>
</x-app-layout>
