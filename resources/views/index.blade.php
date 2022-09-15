@extends('layout.main')

@section('title' , 'Home')

@section('main_content')
<div class="container-lg  h-100">
	@if(session('delete'))
	<div class="pop-up-delete p-4">
		{{session('delete')}} è stato eliminato
	</div>
	@endif
		<a href="{{ route('comics.create') }}" class="btn btn-success border my-3">
			Aggiungi
		</a>
	<table class="table table-dark">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Title</th>
			<th></th>
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
					<td>
						<form action="{{ route('comics.destroy' , $comic->id) }}"  method="POST" class="delete-form">
							@csrf
							@method('delete')
							<input type="submit" class="btn btn-danger border" value="Elimina">
						</form>
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

@section('footer-script')
<script>
	const deleteFormElements = document.querySelectorAll('.delete-form');
	deleteFormElements.forEach(formElement =>{
		//aggiungo un event listener che ascolta per l'evento di submit
		formElement.addEventListener('submit', function(event){
			// ne catturo il funzionamento per non far partire la submit
			event.preventDefault(); //blocchiamo l'esecuzione automatica dell'evento
			//chiedo conferma all'utente
			const result =window.confirm('Sei sicuro?')
			//se l'utente risponde in mainera affermativa
			if(result) this.submit();
		})
	})
</script>
@endsection