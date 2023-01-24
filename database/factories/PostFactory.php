<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'autor' => $this->faker->name,
            'titulo' => $this->faker->sentence(4),
            'extracto' => $this->faker->paragraph(1),
            'caducable' => $this->faker->boolean(),
            'comentable' => $this->faker->boolean(true),
            'acceso' => 'publico',
            'contenido' => $this->faker->paragraph(4),
//            'fecha_publicacion' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'created_at' => date('Y-m-d'),
            'user_id' => 1
        ];
    }
}
