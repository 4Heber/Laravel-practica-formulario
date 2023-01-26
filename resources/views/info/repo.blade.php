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
        <div class="text-center text-bg-dark w-50 p-5 pt-0 rounded rounded-4 shadow">
            <h1 class="fs-1 fw-bold text-primary mt-5 mb-5">GitHub</h1>
            <a href="https://github.com/4Heber/Laravel-practica-formulario.git" target="_blank" class="fs-4 text-bg-primary rounded-4 p-2">Repositorio de la práctica</a>
        </div>
    </div>

</x-app-layout>
