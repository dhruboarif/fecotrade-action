<?php

namespace App\Http\Controllers\Admin;

use App\Models\CashWallet;
use App\Models\MiningWallet;
use App\Models\BonusWallet;
use App\Models\User;
use Auth;

class HomeController
{
    public function index()
    {
        $url = request()->url();
        $user = Auth::user();
        $data['referral'] = User::where('sponsor', $user->id)->orderBy('id', 'desc')->paginate(1);

        $data['level_bonus'] = BonusWallet::where([
            'method' => 'Level Bonus',
            'status' => 'approved',
            'user_id' => $user->id
        ])->orderBy('id', 'desc')->paginate(1);

        $data['level_bonus_earn'] = BonusWallet::where([
            'method' => 'Level Bonus',
            'status' => 'approved',
            'user_id' => $user->id,
            'type' => 'Credit'
        ])->sum('amount');

        $data['total_cash_withdraw'] = CashWallet::where([
            'user_id' => $user->id,
            'type' => 'Debit',
            'status' => 'approved',
        ])->sum('amount');

        $data['total_cash'] = CashWallet::where([
            'user_id' => $user->id,
            'type' => 'Credit',
            'status' => 'approved',
        ])->sum('amount');

        $data['cash_wallet'] = CashWallet::where('user_id', $user->id)->where('status', 'approved')->sum('amount');
        $data['bonus_wallet'] = BonusWallet::where('user_id', $user->id)->where('status', 'approved')->sum('amount');
        $data['mining_wallet'] = MiningWallet::where('user_id', $user->id)->where('status', 'approved')->sum('amount');

        $data['transaction_history'] = BonusWallet::where('method', 'Daily Bonus')->where('user_id', Auth::user()->id)->get();

       

         if($user->user_name === "admin"){
                return view('home1', compact('data'));
            }else{
                return view('home', compact('data'));
            }
    }
}
