@extends('layout.main')

@section('title' , 'Home')

@section('main_content')
<div class="container-lg  h-100">
		<a href="{{ route('comics.create') }}" class="btn btn-success border mb-3">
			Aggiungi
		</a>
	<table class="table table-dark">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Title</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
			@forelse ($comics as $comic)
				<tr>
					<th scope="row">
						<a href="{{route('comics.show', $comic->id )}}">
							{{ $comic->id }}
						</a>
					</th>
					<td>
						<div class="row">
							<div class="col-8">
								{{ $comic->title }} 
							</div>
							<div class="col-4">
								{{ $comic->price }}€
							</div>
						</div>
					</td>
					<td>
						<a href="{{ route('comics.edit' , $comic->id) }}" class="btn btn-success border">Modifica</a>
					</td>
				</tr>
			@empty
				<tr>
					<th scope="row">🛑</th>
					<td>Nessun Fumetto Trovato</td>
				</tr>
				
			@endforelse

		</tbody>
	</table>
</div>


@endsection