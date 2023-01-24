<x-app-layout>
    <x-slot name="title">Post - Detalle</x-slot>

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

    <div class="container w-75 mb-5 mt-4 p-5 bg-dark rounded-top border-start">
        <h2 class="text-light fs-1">{{ $post->titulo }}</h2>
        <p class="text-secondary mb-4">{{ $post->created_at }} por <span class="text-warning">{{ $post->autor }}</span></p>
        <h4 class="text-light fs-2 border-bottom border-secondary mb-4">{{ $post->extracto }}</h4>

        <p class="text-light fs-5 mb-5">{{ $post->contenido }}</p>
        <small class="text-secondary">Última actualización - {{ $post->updated_at }}</small>
    </div>

    <div class="container w-75 p-5 bg-dark rounded-bottom border-start">
        <h4 class="text-light fs-2 border-bottom border-secondary mb-4">Comentarios</h4>
        <article class="container mb-4">
            <p class="text-light fs-5">Username <span class="text-secondary">- 2023-01-24</span></p>
            <p class="text-light ms-5">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur at culpa cupiditate dolor enim exercitationem id itaque iusto modi, nisi nostrum obcaecati odit pariatur quas quos, repellat repellendus. Aperiam cupiditate dicta explicabo hic magnam maxime officiis repellendus sunt. A ad assumenda, autem ex ipsa perspiciatis repellendus rerum unde vel veniam.
            </p>
        </article>

        <article class="container mb-4">
            <p class="text-light fs-5">Username <span class="text-secondary">- 2023-01-24</span></p>
            <p class="text-light ms-5">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam aliquid amet architecto aut consectetur cum cumque, debitis dicta dignissimos earum explicabo fugiat id illo iste itaque laborum libero magnam magni molestiae molestias neque obcaecati officia possimus provident quas quod rem saepe similique soluta totam veniam vero voluptate voluptates voluptatum!
            </p>
        </article>

        <article class="container mb-4">
            <p class="text-light fs-5">Username <span class="text-secondary">- 2023-01-24</span></p>
            <p class="text-light ms-5">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam animi aperiam aspernatur atque consequuntur corporis cupiditate dolor ducimus eos ex excepturi expedita fugiat inventore ipsam itaque iure laborum nam, neque nostrum nulla obcaecati quam quos, ratione repudiandae sed sit temporibus ut voluptates voluptatum. Et iure laudantium libero odio voluptatum.
            </p>
        </article>

        <article class="container mb-4">
            <p class="text-light fs-5">Username <span class="text-secondary">- 2023-01-24</span></p>
            <p class="text-light ms-5">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, at corporis eaque eligendi esse expedita magnam magni nesciunt nobis omnis perspiciatis, porro recusandae rerum similique soluta suscipit tenetur vitae, voluptates. Animi atque dolor ducimus ea eaque, eligendi, enim error ex minus necessitatibus neque nisi nulla, odit porro quas totam veritatis.
            </p>
        </article>

    </div>
</x-app-layout>
