<?php


Route::get('/', function() {         
         // $users = User::all();
          // dd($users);  //dumpdie
         
          //  $user = User::find(1);
         //   return $user->email;
         
//             $email = User::find(1)->only('email');
//             return $email; 
            
//             $user  = User::find(1); //SELECT * FROM users WHERE id = 1
//             dd($user); 
         
//        $users = User::all();
//        return View::make('home.index')->with('users', $users);

//        $email = 'jeffery@envato.com'; //Input::get('email')
//        $password = '1234';
//        $user=User::where_email_and_password($email, $password)->first();
//            dd($user);
    
//        $user = new User;
//        $user->email ='jane@doe.com';
//        $user->password = Hash::make('1234');//hash encrypts the password
//        $user->save(); 
     //you cant save the database since laravel auto-generates fields like,date, & timestamp which is yet to be added in your tables
     $user = User::create(
         array(
           'email' => 'chuck@doe.com',
           'password' => Hash::make(1234),
         )
     );
     
     if ($user) return "Success!";
});

Route::get('about', function()
{                     
	return View::make('home.about');
});


/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});