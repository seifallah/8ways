<h2>Movies</h2>
@foreach($popular_movies['results'] as $movie)
<p>	{{$movie["title"]}} </p>
@endforeach