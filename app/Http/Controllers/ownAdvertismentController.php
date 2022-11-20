<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ownAdvertismentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::all()->where('user_id', Auth::user()->id);

        return view('own-advertisements', [
            'advertisements' => $advertisements,
        ]);
    }
}
