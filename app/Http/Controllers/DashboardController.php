<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Subscription\Entities\UserSubscription;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {

            return view('userdash');
        }

        if (Auth::user()->hasRole('admin')) {
            return view('dashboard');
        }
    }
    public function user_dashbroad(){
        $subscriptions=UserSubscription::where('user_id',Auth::user()->id);
        dd($subscriptions);
    }


}
