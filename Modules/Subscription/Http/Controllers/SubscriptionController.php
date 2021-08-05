<?php

namespace Modules\Subscription\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Subscription\Emails\CustomSubscription;
use Modules\Subscription\Entities\Subscription;
use Modules\Subscription\Entities\UserSubscription;


class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function stripe($id)
    {


        $subscription=Subscription::find($id);
        $amount=$subscription->price;
        \Stripe\Stripe::setApiKey('sk_test_51JL3wXDPf5Cu70cCLyFZqK0cg5ux2jZM2l3LDMgayNzQcvi6TWltAOCv4jP6lbWRkvZ25YNSBSu172uxggUEoL4r00eUPx4tdH');
//        $amount = $amount;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([

            'amount' => $amount,
            'currency' => 'usd',
//            'description' => 'Payment From '.$name,
//            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;
        return view('subscription::stripe',compact('id','intent'));
    }
    public function index()
    {
        $subscriptions = Subscription::where('custom_subscription',0)->get();
        return view('subscription::subscription_plan', compact('subscriptions'));
    }

    public function subscription()
    {

        $subscriptions = Subscription::all();
        return view('subscription::index', compact('subscriptions'));
    }

    public function user_subscription()
    {

        $userscriptions = UserSubscription::all();
        return view('subscription::user_subscription', compact('userscriptions'));
    }

    public function user_get_subscription(Request $request)
    {

        $subscription = Subscription::find($request->id);
        $user = Auth::user()->id;
        $UserSubscription=UserSubscription::where('user_id',$user)->first();
        if($UserSubscription){
            $UserSubscription->update([
                'subscription_id' => $request->id,

            ]);
        }else{
            UserSubscription::create([
                'user_id' => $user,
                'subscription_id' => $request->id,
            ]);
        }

        return redirect('dashboard');

    }
    public function request_for_custom_plan(Request $request){

        $admin=User::find(1);
        $details = [
            'admin_name'=>$admin->name,
            'customer_name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'package_name' => $request->name,
            'price' =>  $request->price,
            'duration'=>$request->duration,
            'type'=>$request->type,
            'coin_spend'=>$request->coin_spend,
            'title' => 'Custom Subscription Package Request',
        ];


        Mail::to($admin->email)->send(new CustomSubscription($details));

        return redirect('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('subscription::create');
    }

    public function create_user_subscription($id)
    {

        $user = User::find($id);
        return view('subscription::create_user_subscription', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Subscription::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'coin_spend' => $request->coin_spend,
            'type' => $request->type
        ]);
        return redirect('subscription/index');

    }

    public function store_user_subscription(Request $request)
    {

        $subscription_id=Subscription::insertGetId([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'coin_spend' => $request->coin_spend,
            'type' => $request->type,
            'custom_subscription'=>1
        ]);
        UserSubscription::create([
            'user_id' => $request->id,
            'subscription_id' => $subscription_id,

        ]);
        return redirect('subscription/users');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('subscription::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('subscription::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
