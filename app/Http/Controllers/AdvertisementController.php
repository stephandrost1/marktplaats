<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\advertisementImage;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $advertisements = Advertisement::all()->where('user_id', '!==', Auth::user()->id);
        } else {
            $advertisements = Advertisement::all();
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

    public function favorites()
    {
        $advertisements = Favorite::all()->where('user_id', Auth::user()->id);

        return view('favorites', [
            'advertisements' => $advertisements,
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

        $favorites = array_map(function($f) {
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

    public function favorite(Request $request) {

        Favorite::create([
            'advertisement_id' => $request->ad_id,
            'user_id' => $request->user_id,
        ]);
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
