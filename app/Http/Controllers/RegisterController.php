<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //URL principal
    public function  index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd($request -> get('name'));

        //validaciones de formulario 
        $this->validate($request, [
            'name' =>'required|min:3|max:30',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:6'
            
        ]); 
       
        //creación de usuario 
        User::create([
            'name' =>$request->name,
            'username' => Str::slug($request->username) ,
            'email' =>$request->email,
            'password' => Hash::make($request->password)  
        ]);

        //autenticar al usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);


        //otra forma de autenticar
        auth()->attempt($request->only('email','password'));

        //redireccionar cuando se crea un nuevo usuario a su muro
        return redirect() -> route('posts.index', auth()->user()->username);
    }
}
