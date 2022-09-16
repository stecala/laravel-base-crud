@extends('layout.main')

@section('title' , 'Create')

@section('main_content')
<div class="container-lg  h-100 text-white">


    <form action="{{ route('comics.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control" id="title" placeholder="Digita il titolo" name="title" required value="{{ old('title',$comic->title) }}"> 
        </div>
        @error('title')
          <div class="alert alert-danger mt-2">
            {{$message}}
          </div>
        @enderror
        <div class="form-group mt-2">
          <label for="description">Descrizione</label>
          <div class="form-floating">
            <textarea class="form-control" id="description" style="height: 100px" name="description" required>{{ old('description', $comic->description) }}</textarea>
          </div>
        </div>
        @error('description')
          <div class="alert alert-danger mt-2">
            {{$message}}
          </div>
        @enderror
        <div class="form-group mt-2">
          <label for="thumb">Link immagine cover</label>
          <input type="text" class="form-control" id="thumb" placeholder="Inserisci il immagine" required name="thumb" value="{{ old('thumb',$comic->thumb) }}">
        </div>
        @error('thumb')
          <div class="alert alert-danger mt-2">
            {{$message}}
          </div>
        @enderror
          <div class="form-group mt-2">
              <label for="price">Prezzo</label>
              <input type="number" class="form-control" step="0.01" id="price" placeholder="min 0,5" required min="0.5" name="price" value="{{ old('price',$comic->price) }}">
          </div>
        @error('price')
          <div class="alert alert-danger mt-2">
            {{$message}}
          </div>
        @enderror
        <div class="form-group mt-2">
            <label for="series">Serie a cui appartiene</label>
            <input type="text" class="form-control" id="series" placeholder="Inserisci serie"  name="series" required value="{{ old('series',$comic->series) }}">
        </div>
        @error('series')
          <div class="alert alert-danger mt-2">
            {{$message}}
          </div>
        @enderror
        <div class="form-group mt-2">
            <label for="sale_date">Data di pubblicazione</label>
            <input type="date" class="form-control" id="sale_date" name="sale_date" required value="{{ old('sale_date',$comic->sale_date) }}">
        </div>
        @error('sale_date')
          <div class="alert alert-danger mt-2">
            {{$message}}
          </div>
        @enderror
        <div class="form-group mt-2">
            <label for="type">Genere</label>
            <input type="text" class="form-control" id="type" placeholder="Inserisci serie"  name="type" required value="{{ old('type',$comic->type) }}">
        </div>
        @error('type')
          <div class="alert alert-danger mt-2">
            {{$message}}
          </div>
        @enderror
        <input type="submit" class="btn btn-success border mt-2" value="Aggiungi">
    </form>
    
</div>
@endsection