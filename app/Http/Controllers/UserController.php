<?php

namespace App\Http\Controllers;

use App\Jobs\MailJob;
use App\Models\Movie;
use App\Models\User;
use App\Models\UserFavoriteMovie;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        $favs = UserFavoriteMovie::where("user_id",auth()->user()->id)->get();
        return view("Frontend.user.dashboard",compact("favs"));
    }
    public function addToFavourite(Request $request){
       $data = $request->data;
       $uid = $data[1];
       $mid = $data[0];
       if($mid == null || $uid == null){
        return response("invalid data");
       }
       $favs = UserFavoriteMovie::where(["movie_id"=>$mid,"user_id"=>$uid])->get();
       if(count($favs) > 0){
        return response("Movie is already in your favourite list.");
       }
      $result =   UserFavoriteMovie::create([
        "movie_id"=> $mid,
        "user_id"=> $uid,
      ]);
      if($result){
        dispatch(new MailJob($mid));
        return response("added fav movie");
      }
      else{
        return response("something went wrong. Please try afain");

      }

    }
    public function deleteFav($id){
        UserFavoriteMovie::find($id)->delete();
        return redirect()->back();
    }
}
