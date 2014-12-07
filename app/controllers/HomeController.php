<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
        //Cookie::queue('aaa', 'abc', 100);
        \Kint::dump(reset(Request::header()['user-agent']));
        Cookie::forget('aaa');
        return 'Welcome cjp';
	}

    public function authTest()
    {
        \Kint::dump(Hash::make('cjp'));
        \Kint::dump(Hash::check('cjp', ''));
        $authResult = Auth::attempt(array('email' => 'cjpcjp@163.com', "password" => 'cjp'));
        \Kint::dump($authResult);
    }
}
