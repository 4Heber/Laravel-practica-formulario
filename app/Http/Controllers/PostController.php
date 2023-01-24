<?php

namespace App\Http\Controllers;
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
            'contenido' => ['required', 'min:6']
        ]);

        // Crear registro accediendo a los campos del formulario
        $newPost = new Post();
        $newPost->autor = User::find($usr_id)->name;
        $newPost->titulo = $request->input('titulo');
        $newPost->extracto = $request->input('extracto');
        $newPost->caducable = $request->input('caducable', false);
        $newPost->comentable = $request->input('comentable', false);
        $newPost->acceso = $request->input('acceso');
        $newPost->contenido = $request->input('contenido');
        $newPost->user_id = $usr_id;

        $newPost->save();

        // Mensaje de sesion, indicando en método flash nombre del mensaje y el contenido
        $request->session()->flash('status','Nuevo post publicado!');

        // Retorno a la vista 'posts'
        return to_route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
