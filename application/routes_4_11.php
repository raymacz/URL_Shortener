<?php


Route::get('/', function() {         
           //   $posts=DB::query('SELECT * FROM posts');
//              $posts=DB::first('SELECT * FROM posts'); // query & select  the first generation array
//            dd($posts);//var_dump($posts);print_r($posts);
            //  var_dump($posts);
  //  $title= 'Some form title4';
 //   $body='Some body4 for the post'; 
    //protect from SQL injecitons
   // $posts = DB::query('INSERT INTO posts(title, body) VALUES(:title, :body)', array($title, $body));
//    $post = DB::query('select title FROM posts WHERE id=1');
//    return      $post[0]->title;
//    $title = DB::only('select title FROM posts WHERE id=1'); //only
//     return  $title;
     //   $posts = DB::table('posts')->get();// SELECT * FROM POSTS
    //  $posts = DB::table('posts')->first(); // first row
    //   $posts = DB::table('posts')->where('id','!=', 3)->get();
    //$posts = DB::table('posts')->where('id','=',2)->only('title');
  //  $posts = DB::table('posts')->get('title as heading');
   //     $posts = DB::table('posts')->get(array( 'title as heading', 'body as boody', ));
//        $posts = DB::table('posts')
//             ->where('id','!=', 2 )
//             ->or_where('title', '=','My title')
//           ->get('title as heading');
          
                //dynamic clauses
//            $posts=  DB::table ('posts')
//                    ->where_title_and_body('My title','the body of my posts')
//                    ->get();
               $posts=  DB::table ('posts')
                       //   ->where('id', '=', 2)  //  ->or_where('title', '=', 'My title')
                          ->where_id_or_title('2', 'My title')
                          ->take(2) // limit
                          ->order_by('id','desc')
                   
//                          ->where(function($query) {
//                            $query->where('id', '=', 2);
//                            $query->or_where('title', '=', 'My title');
//                          })
                            ->get();
                dd($posts);           
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