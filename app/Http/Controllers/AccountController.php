<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        return view('profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = Auth::user()->id;

        return view('edit-profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return Redirect::to('profiel-bewerken')->withErrors(['failed' => 'Wachtwoord is onjuist!']);
        } else {
            $user = User::find($user->id);

            $user->update([
                'first_name' => $request->first_name,
                'prefix_name' => $request->prefix_name,
                'last_name' => $request->last_name,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'street_name' => $request->street_name,
                'house_number' => $request->house_number,
            ]);

            return Redirect::to('mijn-profiel')->withErrors(['succes' => 'Profiel is geüpdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {
            return view('advertisements')->with('succes', 'Account is verwijderd!');
        }
    }
}
