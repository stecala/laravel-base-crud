@extends('layout.main')

@section('title' , 'Edit')

@section('main_content')
<div class="container-lg  h-100 text-white">
    <form action="{{ route( 'comics.update', $comic->id)}}" method="POST">
        @csrf
        @method('PUT')
        @include('include.form')
        <input type="submit" class="btn btn-success border mt-2" value="Modifica">
    </form>
    
</div>
@endsection