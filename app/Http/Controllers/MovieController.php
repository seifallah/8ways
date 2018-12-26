<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class MovieController extends Controller
{
    // show all popular movies
    public function index()
    {
    	$client = new Client();
		$result = $client->get('https://api.themoviedb.org/3/discover/movie', [
		    'form_params' => [
		        'api_key' => '094b0c335ecdcb49d025af86261a6c76',
		        'sort_by' => 'popularity.desc'
		    ]
		]);

		$popular_movies = $result->getBody();
         return view('movies.list')->with('popular_movies', json_decode($popular_movies, true));
    }

    // search movies by title
    public function search($title)
    {
    	$client = new Client();
		$result = $client->get('https://api.themoviedb.org/3/search/movie', [
		    'form_params' => [
		        'api_key' => '094b0c335ecdcb49d025af86261a6c76',
		        'query' => $title
		    ]
		]);

		$popular_movies = $result->getBody();
         return view('movies.list')->with('popular_movies', json_decode($popular_movies, true));

    
    }

    // sort movies by title & rate
    public function sort()
    {
        return view('welcome');
    }

    // show movie details
    public function show($id)
    {
        $client = new Client();
		$result = $client->get('https://api.themoviedb.org/3/find/'.$id, [
		    'form_params' => [
		        'api_key' => '094b0c335ecdcb49d025af86261a6c76',
		        'external_source' => 'imdb_id'
		    ]
		]);

		$popular_movies = $result->getBody();
         return view('movies.list')->with('popular_movies', json_decode($popular_movies, true));

    }
}
