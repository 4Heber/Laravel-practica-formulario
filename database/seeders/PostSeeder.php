<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Database\Factories\PostFactory;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registro manual
        $post = new Post();
        $post->autor = 'test_user';
        $post->titulo= 'Formularios en Laravel';
        $post->extracto= 'Práctica UD6 con formularios';
        $post->caducable = false;
        $post->comentable = false;
        $post->acceso = 'publico';
        $post->contenido = 'Creación de proyecto Laravel para practicar con formularios';
//        $post->fecha_publicacion = date('Y-m-d');
        $post->user_id = 1;
        $post->save();

        // Registros utilizando factories
        Post::factory(5)->create();
    }
}
