<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

   public function __construct() {
		$this->middleware(function($request, $next) {
			if (auth()->user()->subscribed('main') ) {
				return redirect('/home')
					->with('message',  [__("Actualmente ya estás suscrito a otro plan"),'bg-teal']);
			}
			return $next($request);
		})
		->only(['plans', 'processSubscription']);

		$this->middleware('auth')->only(['resume','admin','cancel']);
	}


	public function plans () {
		return view('subscriptions.plans');
    }

    public function processSubscription (Request $request) {
	    $token = request('stripeToken');
	    try {
			if ( \request()->has('coupon')) {
				 $request->user()->newSubscription('main', $request->plan)
					->withCoupon($request->coupon)->create($token);
			} else {
				 $request->user()->newSubscription('main', $request->plan)->create($token);
			}
		    return redirect(route('subscriptions.admin'))
			    ->with('success', [__("La suscripción se ha llevado a cabo correctamente"),'bg-teal']);
	    } catch (\Exception $exception) {
	    	$error = $exception->getMessage();
	    	return back()->with('message', [$error,'bg-red']);
	    }
    }     


    public function admin () {
		$subscriptions = auth()->user()->subscriptions;
		return view('subscriptions.admin', compact('subscriptions'));
    }

    public function resume () {
		$subscription = \request()->user()->subscription(\request('plan'));
		if ($subscription->cancelled() && $subscription->onGracePeriod()) {
			\request()->user()->subscription(\request('plan'))->resume();
			return back()->with('action', [ __("Has reanudado tu suscripción correctamente") ,'bg-teal']);
		}
		return back();
    }

    public function cancel () {
		auth()->user()->subscription(\request('plan'))->cancel();
	    return back()->with('action', [__("La suscripción se ha cancelado correctamente"),'alert-danger']);
    }


}
