@extends('layout.main')

@section('title' , 'Home')

@section('main_content')
<div class="container-lg d-flex align-items-center h-100">

	<table class="table table-dark">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Title</th>
			
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