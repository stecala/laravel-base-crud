@extends('layout.main')

@section('title' , $comic->title)

@section('main_content')
    <div class="container-lg comic-container">
        <div class="row">
            <div class="coll-12 mb-5 text-center">
                <h3>{{ $comic->title }}</h3>
            </div>
            <div class="col-3">
                <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-12">
                        <h5>
                            Descrizione:
                        </h5>
                        {{ $comic->description }}
                    </div>
                    <div class="col-12 mt-3">
                        <h5 class="d-inline-block">
                            Data di uscita:
                        </h5>
                        <?php  
                            $orgDate = $comic->sale_date;  
                            $newDate = date("d-m-Y", strtotime($orgDate));  
                            echo $newDate;  
                        ?>  
                    </div>
                    <div class="col-12 mt-3">
                        <h5 class="d-inline-block">
                            Prezzo:
                        </h5>
                        {{ $comic->price }}€
                    </div>
                    <div>
                        <form action="{{ route('comics.destroy' , $comic->id) }}"  method="POST" class="delete-form"> 
							@csrf
							@method('delete')
							<input type="submit" class="btn btn-danger border" value="Elimina">
						</form>
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection
@section('footer-script')
<script>
	const deleteElements = document.querySelectorAll('.delete-form');
	deleteElements.forEach(formElement =>{
		formElement.addEventListener('submit', function(event){
			event.preventDefault();
			const result =window.confirm('Sei sicuro?')
			if(result) this.submit();
		})
	})
</script>
@endsection