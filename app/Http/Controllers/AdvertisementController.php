<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\advertisementImage;
use App\Models\Bid;
use App\Models\Categorie;
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
        $categories = Categorie::all();

        $term = $request->term;
        $categorie = $request->categorie;

        if (Auth::user()) {
            if ($term && $categorie) {
                $advertisements = Advertisement::where('user_id', '!=', Auth::user()->id)->where('name', 'LIKE', "%$term%")->where('categorie_id', $categorie)->get();
            } elseif (!$term && $categorie) {
                $advertisements = Advertisement::where('user_id', '!=', Auth::user()->id)->where('categorie_id', $categorie)->get();
            } elseif ($term && !$categorie) {
                $advertisements = Advertisement::where('user_id', '!=', Auth::user()->id)->where('name', 'LIKE', "%$term%")->get();
            } else {
                $advertisements = Advertisement::where('user_id', '!=', Auth::user()->id)->get();
            }
        } else {
            if ($term && $categorie) {
                $advertisements = Advertisement::where('name', 'LIKE', "%$term%")->where('categorie_id', $categorie)->get();
            } elseif (!$term && $categorie) {
                $advertisements = Advertisement::where('categorie_id', $categorie)->get();
            } elseif ($term && !$categorie) {
                $advertisements = Advertisement::where('name', 'LIKE', "%$term%")->get();
            } else {
                $advertisements = Advertisement::all();
            }
        }

        return view('advertisements', [
            'advertisements' => $advertisements,
            'categories' => $categories,
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
