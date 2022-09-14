@extends('layout.main')

@section('title' , 'Create')

@section('main_content')
<div class="container-lg  h-100 text-white">
    <form action="{{ route('comics.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control" id="title" placeholder="Digita il titolo" name="title" required>
        </div>
        <div class="form-group mt-2">
          <label for="description">Descrizione</label>
          <div class="form-floating">
            <textarea class="form-control" id="description" style="height: 100px" name="description" required></textarea>
          </div>
        </div>
        <div class="form-group mt-2">
          <label for="thumb">Link immagine cover</label>
          <input type="text" class="form-control" id="thumb" placeholder="Inserisci il immagine" required name="thumb">
        </div>
        <div class="form-group mt-2">
            <label for="price">Prezzo</label>
            <input type="number" class="form-control" step="0.01" id="price" placeholder="min 0,5" required min="0.5" name="price">
        </div>
        <div class="form-group mt-2">
            <label for="series">Serie a cui appartiene</label>
            <input type="text" class="form-control" id="series" placeholder="Inserisci serie"  name="series" required>
        </div>
        <div class="form-group mt-2">
            <label for="sale_date">Data di pubblicazione</label>
            <input type="date" class="form-control" id="sale_date" name="sale_date" required>
        </div>
        <div class="form-group mt-2">
            <label for="type">Genere</label>
            <input type="text" class="form-control" id="type" placeholder="Inserisci serie"  name="type" required>
        </div>
        <input type="submit" class="btn btn-success border mt-2" value="Aggiungi">
    </form>
    
</div>
@endsection