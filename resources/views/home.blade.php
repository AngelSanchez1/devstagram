@extends('layouts.app')

@section('titulo')
Página Principal
@endsection

@section('contenido')

<x-listar-Post :posts="$posts">
</x-listar-Post>

@endsection