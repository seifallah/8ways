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
    public function search()
    {
        return view('welcome');
    }

    // sort movies by title & rate
    public function sort()
    {
        return view('welcome');
    }

    // show movie details
    public function show()
    {
        return view('welcome');
    }
}
