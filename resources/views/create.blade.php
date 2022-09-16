@extends('layout.main')

@section('title' , 'Create')

@section('main_content')
<div class="container-lg  h-100 text-white">


    <form action="{{ route('comics.store')}}" method="POST">
        @csrf
        @include('include.form')
        <input type="submit" class="btn btn-success border mt-2" value="Aggiungi">
    </form>
    
</div>
@endsection