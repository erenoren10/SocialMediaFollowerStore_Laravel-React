<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function getBalance()
    {
        $user = Auth::user();
        $balance = Balance::where('user_id', $user->id)->first();

        if ($balance) {
            return $balance->balance;
        } else {
            return 0.00;
        }
    }

    public function updateBalance($amount)
    {
        $user = Auth::user();
        $balance = Balance::where('user_id', $user->id)->first();

        if ($balance) {
            $balance->balance += $amount;
            $balance->save();
        } else {
            Balance::create([
                'user_id' => $user->id,
                'balance' => $amount,
            ]);
        }

        return $balance->balance;
    }

    public function showBalance()
    {
        $user = Auth::user();
        $balance = Balance::where('user_id', $user->id)->first();

        return view('balance.show', compact('balances'));
    }
}
