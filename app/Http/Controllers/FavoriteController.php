<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorite::all()->where('user_id', Auth::user()->id);

        return view('favorites', [
            'favorites' => $favorites,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toggleFavorite(Request $request)
    {
        $checkFavorite = Favorite::all();
        $checkFavorite = $checkFavorite->where('user_id', '=', Auth::user()->id);
        $checkFavorite = $checkFavorite->where('advertisement_id', '=', $request->ad_id)->first();

        if ($checkFavorite) {
            $checkFavorite->delete();

            return response()->json('dislike');
        } else {
            Favorite::create([
                'user_id' => Auth::user()->id,
                'advertisement_id' => $request->ad_id,
            ]);

            return response()->json('like');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
