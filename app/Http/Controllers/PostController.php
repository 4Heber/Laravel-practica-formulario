<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Query a DB mediante Model Post
        $posts = Post::get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ID del usuario para insertar nombre autor
        $usr_id = Auth::id();

        // Validación del formulario
        $request->validate([
            'titulo' => ['required', 'min:4'],
            'extracto' => ['required', 'min:4'],
            'contenido' => ['required', 'min:6']
        ]);

        // Crear registro accediendo a los campos del formulario
        $post = new Post();
        $post->autor = User::find($usr_id)->name;
        $post->titulo = $request->input('titulo');
        $post->extracto = $request->input('extracto');
        $post->caducable = $request->input('caducable', false);
        $post->comentable = $request->input('comentable', false);
        $post->acceso = $request->input('acceso');
        $post->contenido = $request->input('contenido');
        $post->user_id = $usr_id;

        $post->save();

        // Mensaje de sesion, indicando en método flash nombre del mensaje y el contenido
        $request->session()->flash('status','Nuevo post publicado!');

        // Retorno a la vista 'posts'
        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('EditPost', $post);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Validación del formulario
        $request->validate([
            'titulo' => ['required', 'min:4'],
            'contenido' => ['required', 'min:6']
        ]);

        $post->titulo = $request->input('titulo');
        $post->extracto = $request->input('extracto');
        $post->caducable = $request->input('caducable', false);
        $post->comentable = $request->input('comentable', false);
        $post->acceso = $request->input('acceso');
        $post->contenido = $request->input('contenido');

        $post->save();

        // Mensaje de sesion, indicando en método flash nombre del mensaje y el contenido
        $request->session()->flash('status','Post actualizado!');

        // Retorno a la vista detalle del post editado
        return to_route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('EditPost', $post);

        $post->delete();

        return to_route('posts.index')->with('status', 'Post eliminado!');
    }
}
