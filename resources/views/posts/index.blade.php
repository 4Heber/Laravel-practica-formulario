<x-app-layout>
    <x-slot name="title">Posts</x-slot>

    <x-slot name="header">
        <header class="p-3 text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

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
                                <a href="{{ route('login') }}" class="text-sm btn btn-outline-light me-2">Login</a>

                            @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm btn btn-warning">Sign-up</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </header>
    </x-slot>

        <div class="p-4">
            <h2 class="text-light text-center fs-1">Posts</h2>
        </div>

        <section class="container">
            <article class="row">
                @for($i = sizeof($posts)-1; $i >= 0; $i--)
                    <div class="col-4 p4 ">
                        <div class="card mb-5 p-0">
                            <div class="card-header text-bg-dark d-flex flex-row justify-content-start align-items-center">
{{--                                <img src="#" class="card-img-top mr-2" alt="profile-img" style="width: 3rem">--}}
                                <span>{{ $posts[$i]->autor }}</span>
                            </div>

                            <div class="card-body">
                                <a href='{{ route('posts.show', $posts[$i]->id) }}' style="text-decoration: none; cursor: pointer; ">
                                    <h4 class="card-title">{{ $posts[$i]->titulo }}</h4>
                                    <h5 class="card-subtitle text-dark">{{ $posts[$i]->extracto }}</h5>
                                    <p class="card-text text-truncate text-muted py-4">{{ $posts[$i]->contenido }}</p>
                                    <a href='{{ route('posts.show', $posts[$i]->id) }}' class="btn btn-primary">Seguir leyendo</a>
                                </a>
                            </div>

                            <div class="card-footer w-100 d-flex flex-row justify-content-between align-items-center">
                                <div class="container w-100">
                                    <p class="text-muted" style="font-size: 0.8rem; margin: 0;">Publicado: {{ $posts[$i]->created_at }}</p>
                                    <p class="text-muted" style="font-size: 0.8rem; margin: 0;">Actualizado: {{ $posts[$i]->updated_at }}</p>
                                </div>
                                @auth
                                    <div class="container w-75 d-flex flex-row justify-content-between">
                                        <form action="{{ route('posts.destroy', $posts[$i]) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-danger"><i class="fas fa-backspace"></i> Eliminar</button>
                                        </form>
                                        <a href="{{ route('posts.edit', $posts[$i]) }}"><i class="fas fa-edit"></i> Editar</a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endfor
            </article>
        </section>

</x-app-layout>
