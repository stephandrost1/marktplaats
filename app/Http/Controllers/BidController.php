<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
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

            session()->flash('succesMsg', 'Je bod is geplaatst!');
            return redirect('detail/' . $id);
        } else {
            session()->flash('failedMsg', 'Bod moet hoger zijn dan het huidige hoogste bod!');
            return redirect('detail/' . $id);
        }
    }
}
