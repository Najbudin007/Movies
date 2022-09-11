<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use App\Models\UserFavoriteMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::latest()->paginate(2);
        return view("Backend.movie.index",compact("movies"));
    }

    public function UserFavorite() {
        // $favorite = UserFavoriteMovie::latest()->paginate(2);
        $favorite = User::latest()->with("favourites.movie")->get();
        return view("Backend.UserFavorite.Favorite", compact("favorite"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Backend.movie.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title"=>"required",
            "description"=>"required",
            "release_date"=>"required",
            "poster"=>"required",
            "status"=>"required"
        ]);
        $imageName = time() . '.' . $request->poster->getClientOriginalName();
        $request->poster->move(public_path('images/'), $imageName);
        $data["poster"] = $imageName;
        Movie::create($data);
        notify()->success("Movie is created");
        return redirect()->route("movies.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view("Backend.movie.show",["movie"=>$movie]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view("Backend.movie.edit",["movie"=>$movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            "title"=>"required",
            "description"=>"required",
            "release_date"=>"required",
            "poster"=>"sometimes",
            "status"=>"sometimes"
        ]);
        $imageName = time() . '.' . $request->poster->getClientOriginalName();
        $request->poster->move(public_path('images/'), $imageName);
        $data["poster"] = $imageName;
        $movie->update($data);
        notify()->success("Movie is updated");
        return redirect()->route("movies.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
       $mov =  $movie->delete();
       if($mov){
        $image = "images/".$movie->poster;
       if( File::exists($image)){
        File::delete($image);
       }
       }
       notify()->success("Movie is deleted");
       return redirect()->back();
    }
}
