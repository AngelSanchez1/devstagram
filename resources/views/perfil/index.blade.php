@extends('layouts.app')

@section('titulo')
Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6 border border-blue-300 rounded-2xl ">
        <form method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
            @csrf
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username
                </label>
                <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded-md @error('username')
                    border-red-500
                @enderror" value="{{ auth()->user()->username}}">
                @error('username')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    email
                </label>
                <input id="email" name="email" type="email" placeholder="Tu email registrado" class="border p-3 w-full rounded-md @error('email')
                border-red-500
                @enderror" value="{{ auth()->user()->email }}">
                @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                    Imagen Perfil
                </label>
                <input id="imagen" name="imagen" type="file" class="border p-3 w-full rounded-md" value="" accept=".jpg, .jpej, .png">
            </div>


            <!-- <div class="mb-5">
                <input type="checkbox" id="cambiarPassword" name="cambiarPassword">
                <label for="cambiarPassword" class="text-sm text-gray-500"> Cambiar contraseña</label>
            </div>

            <div class="mb-5 hidden" id="passwordFields">
                <label for="password_actual" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña actual</label>
                <input id="password_actual" name="password_actual" type="password" placeholder="Tu contraseña actual" class="border p-3 w-full rounded-md @error('password_actual') border-red-500 @enderror">
                @error('password_actual')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5 hidden" id="nuevaPasswordFields">
                <label for="nueva_password" class="mb-2 block uppercase text-gray-500 font-bold">Nueva contraseña</label>
                <input id="nueva_password" name="nueva_password" type="password" placeholder="Tu nueva contraseña" class="border p-3 w-full rounded-md @error('nueva_password') border-red-500 @enderror">
                @error('nueva_password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div> -->



            <input type="submit" value="Guardar Cambios" class="bg-sky-600 hover:bg-sky-800 transition-colors cursosr-pointer
            uppercase font-bold w-full p-3 text-white rounded-lg">

        </form>
    </div>
</div>

<script>
    const cambiarPasswordCheckbox = document.getElementById('cambiarPassword');
    const passwordFields = document.getElementById('passwordFields');
    const nuevaPasswordFields = document.getElementById('nuevaPasswordFields');

    cambiarPasswordCheckbox.addEventListener('change', function () {
        if (cambiarPasswordCheckbox.checked) {
            passwordFields.classList.remove('hidden');
            nuevaPasswordFields.classList.remove('hidden');
        } else {
            passwordFields.classList.add('hidden');
            nuevaPasswordFields.classList.add('hidden');
        }
    });
</script>



@endsection