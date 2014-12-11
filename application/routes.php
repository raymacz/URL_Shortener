<?php

Route::get('/', function() {         
        return View::make('home.index');
});

Route::post('/', function() {       
    phpinfo();
     //dd($_POST);
        $url = Input::get('url'); // http://tutsplus.com
    //Validate the url   // Validator::make($data, $rules, $messages);
    /// Validator::make(array('url' => $url, ), $rules); // array( 'url' => 'required|url'
        //validate url
      $v =  Url::validate(array('url' => $url));
        
      if ($v !== TRUE) {
          return Redirect::to('/')->with_errors($v->errors);
      }

    //if the url is already in the table, 
    $record = Url::where_url($url)->first();    // dd($record);
    // then return it
    if ($record) {
        return View::make('home.result')
                    ->with('shortened',$record->shortened); //TIP: xdebug conflicts with laravel
    }
        //Otherwise, add a new row, and return the shortened teurl
        
        
        $shortened = Url::get_unique_short_url();
       // dd($shortened);
     $row = Url::create(array( // CREATES a NEW record on DB
         'url' => $url,
        'shortened' => $shortened
      ));
    //Create a results view, and present the short url  to the user
        if ($row) {
            return View::make('home.result')->with('shortened', $row->shortened);
        } else {
            //TODO if $row was not created
        }
     
     
     
});
Route::get('(:any)', function($shortened) {         //:any means wildcards
           //query the DB for that row with that short url
       $row = Url::where_shortened($shortened)->first();   
        //  if not found, redirect to home page
        if (is_null($row)) return Redirect::to('/');
        // Otherwise, fetch the URL and redirect
        return Redirect::to($row->url);  
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