<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //funcion para mostrar todos los reply
        $reply = Reply::paginate(5);
        return view('dashboard.reply.index',['reply'=>$reply]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //funcion para crear
        $reply = new Reply();
        $reply->post_id = 1;
        $reply->save();

        return view('dashboard.reply.create',['reply'=>$reply]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'post_id' => 'required',
        ]);

        $reply = Reply::create($request->all());

        return redirect()->route('reply.index')
            ->with('success', 'Reply created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //funcion para mostrar un reply
        return view('dashboard.reply.show',['reply'=>$reply]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reply $reply)
    {
        //funcion para editar
        $reply = Reply::find($reply->id);
        return view('dashboard.reply.edit',['reply'=>$reply]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reply $reply)
    {
        //funcion para actualizar
        request()->validate([
            'post_id' => 'required',
        ]);

        $reply->update($request->all());

        return redirect()->route('reply.index')
            ->with('success', 'Reply updated successfully');

  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        //funcion para eliminar
        $reply->delete();
        return redirect()->route('reply.index')
            ->with('success', 'Reply deleted successfully');
    }
}
