<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\advertisementImage;
use App\Models\Bid;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $term = $request->term;
        $advertisements = Advertisement::all();

        if (Auth::user()) {
            if ($term) {
                $advertisements = $advertisements->where('user_id', '!==', Auth::user()->id);
                $advertisements = $advertisements->where('name', 'LIKE', '%' . $term . '%');
            } else {
                $advertisements = $advertisements->where('user_id', '!==', Auth::user()->id);
            }
        } else {
            if ($term) {
                $advertisements = $advertisements->where('name', 'LIKE', '%' . $term . '%');
            } else {
                $advertisements = Advertisement::all();
            }
        }

        return view('advertisements', [
            'advertisements' => $advertisements,
        ]);
    }

    public function ownAdvertisements()
    {
        $advertisements = Advertisement::all()->where('user_id', Auth::user()->id);

        return view('own-advertisements', [
            'advertisements' => $advertisements,
        ]);
    }

    public function favoriteAdd(Request $request)
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

    public function favorites()
    {
        $favorites = Favorite::all()->where('user_id', Auth::user()->id);

        return view('favorites', [
            'favorites' => $favorites,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-advertisement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        advertisementImage::create([]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement, $id)
    {
        $advertisement = Advertisement::find($id);

        $favorites = array_map(function ($f) {
            return $f['user_id'];
        }, $advertisement->favorites->toArray());

        // Must set config/session.php 'secure' to false
        if (Cookie::get($advertisement->id) == '') {
            Cookie::queue($advertisement->id, '1', 1);
            $advertisement->page_views++;
            $advertisement->save();
        }

        return view('detail', [
            'advertisement' => $advertisement,
            'favorites' => $favorites,
        ]);
    }

    public function bid(Request $request, $id)
    {
        $new_bid = $request->bidding_amount;
        $highest_bid = Bid::all()->where('advertisement_id', $id)->sortByDesc('bid')->first();

        if (!$highest_bid || $new_bid > $highest_bid->bid) {
            Bid::create([
                'bid' => $new_bid,
                'user_id' => Auth::user()->id,
                'advertisement_id' => $id,
            ]);

            return Redirect::to('detail/' . $id)->withErrors(['succes' => 'Bod geplaatst!']);
        } else {
            return Redirect::to('detail/' . $id)->withErrors(['failed' => 'Bod moet hoger zijn dan het hoogste huidige bod!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }
}
