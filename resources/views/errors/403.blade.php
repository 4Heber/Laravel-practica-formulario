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

    <div class="d-flex align-items-center justify-content-center mt-5">
        <div class="text-center">
            <h1 class="display-1 fw-bold text-danger mt-5">403</h1>
            <p class="fs-3 text-light"> <span class="text-danger mt-5">Hey</span> no estas autorizado para esta acción.</p>
            <p class="fs-3 text-light">Debes ser el autor para <span class="text-danger mt-5">eliminar</span> / <span class="text-danger mt-5">editar</span> el post.</p>
            <a href="/" class="btn btn-primary mt-5 fs-4">Ir a Inicio</a>
        </div>
    </div>

</x-app-layout>
