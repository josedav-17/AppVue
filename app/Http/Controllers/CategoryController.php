<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::paginate(5);
        return view('dashboard.category.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:5'
        ]);

        $category= new Category();
        $category->user_id=auth()->user()->id;
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        $category->save();

        return back()->with('status', 'Categoria creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //funcion para mostrar la categoria
        return view('dashboard.category.show', ['category' => $category]);

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:5'
        ]);
        
        $category=Category::find($category->id);
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        $category->save();

        return back()->with('status', 'Categoria actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //eliminar la categoria solo la puede hacer el usuario que las creo
        $category->delete();
        return back()->with('status', 'Categoria eliminada con exito');

    }
}
