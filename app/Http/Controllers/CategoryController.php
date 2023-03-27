<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\post;// MODELO DE POST
use App\Http\Requests\StorePost; // PARA PODER VALIDAR LOS DATOS

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // FUNCION PARA MOSTRAR TODOS LOS POSTS
        $categories = Category::paginate(5);
        return view('dashboard.category.index', ['categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // este controler esta relacionado con el modelo de post por lo tanto se debe de pasar el id del usuario
        return view('dashboard.category.create');
        // los datos que enviamos a la base de datos son los siguientes
        // name, description
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // FUNCION PARA GUARDAR UN POST
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->user_id = $request->user_id; 
        $category->category_id = $request->category_id;
        $category->post_id = $request->post_id;
        $category->save();

        return back()->with('status', 'Categoria creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // FUNCION PARA MOSTRAR UN POST
        return view('dashboard.category.show', ['category' => $category]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // FUNCION PARA EDITAR UN POST
        return view('dashboard.category.edit', ['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //  FUNCION PARA ACTUALIZAR UN POST
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return back()->with('status', 'Categoria actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // FUNCION PARA ELIMINAR UN POST
        $category->delete();
        return back()->with('status', 'Categoria eliminada con exito');

    }
}
