<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //validar
    public function store(Request $request, User $user, Post $post)
    {
        $this->validate($request, [
            'comentario' => 'required|max:250'
        ]);

        //almacenar
        Comentario::Create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request ->comentario ,
        ]);

        //imprimir el mensaje
        return back()->with('mensaje','Comentario Realizado Correctamente');
    }
}
