<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            session()->flash('failedMsg', 'Het ingevoerde wachtwoord is onjuist!');

            return view('edit-profile', [
                'user' => User::findOrFail($user->id)
            ]);
        } else {
            $user = User::find($user->id);

            if ($request->profile_image && File::exists(public_path('images/users/' . Auth::user()->path))) {
                File::delete(public_path('images/users/' . Auth::user()->path));
            }

            if ($request->new_password && $request->confirm_new_password) {
                if ($request->new_password == $request->confirm_new_password) {
                    $user->update([
                        'password' => Hash::make($request->new_password),
                    ]);
                } else {
                    session()->flash('failedMsg', 'De wachtwoorden komen niet overeen!');
                    return view('edit-profile', [
                        'user' => User::findOrFail($user->id)
                    ]);
                }
            }

            if (!$request->new_password && $request->confirm_new_password || $request->new_password && !$request->confirm_new_password) {
                session()->flash('failedMsg', 'Vul beide wachtwoord velden in!');
                return view('edit-profile', [
                    'user' => User::findOrFail($user->id)
                ]);
            }

            $user->update([
                'first_name' => $request->first_name,
                'prefix_name' => $request->prefix_name,
                'last_name' => $request->last_name,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'street_name' => $request->street_name,
                'house_number' => $request->house_number,
            ]);

            if ($request->profile_image) {
                $image = $request->file('profile_image');
                $imageName = Auth::user()->first_name . '-' . Auth::user()->last_name . '.' . time() . '.' . $image->extension();
                $image->move(public_path('images/users'), $imageName);

                $user->update([
                    'path' => $imageName,
                ]);
            }

            session()->flash('succesMsg', 'Je profiel is succesvol geüpdate!');
            return redirect('mijn-profiel');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = User::find(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {
            session()->flash('succesMsg', 'Je account is succesvol verwijdert!');
            return redirect('/advertenties');
        }
    }
}
