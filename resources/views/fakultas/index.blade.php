<<<<<<< HEAD
<h2>Fakultas</h2>
 - {{ $ilkom}}
=======

{{-- @include('layout.header') --}}

@extends('layout.master')
@section('title','Halaman Fakultas')

@section('content')
<h2>Fakultas</h2>
{{-- - {{ $ilkom}} --}}
<ul>
    @if (count($fakultas) > 0)
    
        @foreach ($fakultas as $item)
            <li> {{ $item }}</li>
        @endforeach
    @else
        <li>Belum ada data </li>
    @endif
</ul>
@endsection

{{-- @include('layout.footer') --}} 
>>>>>>> cba44ddeedc9f6dd7b93bad042b52b37ced443ac
