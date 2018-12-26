<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class MovieController extends Controller
{
	protected $api_key;
	protected $base_path;

	public function __construct()
    {
        $this->api_key =  env("MOVIEDB_API_KEY", null);
        $this->base_path =  env("MOVIEDB_HOST", null);
    }


    // show all popular movies
    public function index()
    {
    	$client = new Client();
		$result = $client->get($this->base_path.'discover/movie', [
		    'form_params' => [
		        'api_key' => $this->api_key,
		        'sort_by' => 'popularity.desc'
		    ]
		]);

		$movies = $result->getBody();
         return view('movies.list')->with('movies', json_decode($movies, true));
    }

    // search movies by title
    public function search($title)
    {
    	$client = new Client();
		$result = $client->get($this->base_path.'search/movie', [
		    'form_params' => [
		        'api_key' => $this->api_key,
		        'query' => $title
		    ]
		]);

		$movies = $result->getBody();
         return view('movies.list')->with('movies', json_decode($movies, true));

    
    }

    // sort movies by title & vote
    public function sort($sortby)
    {
        //if sort_by = title => original_title,
        //sort_by = vote => vote_count
    	$client = new Client();
		$result = $client->get($this->base_path.'discover/movie', [
		    'form_params' => [
		        'api_key' => $this->api_key,
		        'sort_by' => $sortby.'.desc'
		    ]
		]);

		$movies = $result->getBody();
         return view('movies.list')->with('movies', json_decode($movies, true));
    }



    // show movie details
    public function show($id)
    {
        $client = new Client();
		$result = $client->get($this->base_path.'find/'.$id, [
		    'form_params' => [
		        'api_key' => $this->api_key,
		        'external_source' => 'imdb_id'
		    ]
		]);

		$popular_movies = $result->getBody();
         return view('movies.list')->with('popular_movies', json_decode($popular_movies, true));

    }
}
