
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<span>Movies</span>
                	<ul class="list-inline float-right">
                		<li class="list-inline-item"><a href="{{ url('/movies') }}">Populaire</a></li>
                		<li class="list-inline-item"><a href="{{ url('/movies/sort/original_title') }}">Tri par Titre</a></li>
                		<li class="list-inline-item"><a href="{{ url('/movies/sort/vote_count') }}">Tri par vote</a></li>
                	</ul>
                </div>

                <div class="card-body">
  					@foreach($movies['results'] as $movie)
						<div class="card mb-2">
						  <img class="card-img-top" 
						  @if($movie["poster_path"] != null)
						  	src="https://image.tmdb.org/t/p/w500/{{$movie["poster_path"]}}" 
						  @else
						  	src="https://user-images.githubusercontent.com/24848110/33519396-7e56363c-d79d-11e7-969b-09782f5ccbab.png" 
						  @endif
						  alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">
						    	<a href="#" class="">{{$movie["title"]}}</a>
						    </h5>
						    <p class="card-text">
						    	 <ul>
						    	 	<li>Année: {{$movie["release_date"]}}</li>
						    	 	<li>Note: {{$movie["vote_average"]}} ( {{$movie["vote_count"]}} avis)</li>
						    	 </ul>
						 	</p>
						    
						  </div>
						</div>
					@endforeach
					<p>//movie_results</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

