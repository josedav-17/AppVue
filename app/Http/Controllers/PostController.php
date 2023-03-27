<?php

namespace App\Http\Controllers;

use App\Models\post;// MODELO DE POST
use Illuminate\Http\Request; // PARA PODER RECIBIR DATOS
use App\Http\Requests\StorePost; // PARA PODER VALIDAR LOS DATOS

// llamamos al controlador de categorias para poder usarlo en el controlador de post
use App\Http\Controllers\CategoryController;



class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        // FUNCION PARA MOSTRAR TODOS LOS POSTS
        $posts = post::paginate(5);
        return view('dashboard.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // para crear un post se deben de pasar los datos del usuario que lo crea
        return view('dashboard.post.create');
        // los datos que enviamos a la base de datos son los siguientes
        // name, description, user_id


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePost $request)
    {
        // FUNCION PARA GUARDAR UN POST
        $post = new post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->save();

        return back()->with('status', 'Post creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        // FUNCION PARA MOSTRAR UN POST

        return view('dashboard.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        // FUNCION PARA EDITAR UN POST
        return view('dashboard.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
    
        $post->update($request->validated());
        return back()->with('status', 'Post actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        // FUNCION PARA ELIMINAR UN POST
        $post->delete();
        return back()->with('status', 'Post eliminado con exito');
        

    }
}
