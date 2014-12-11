<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>My Website</title>
	<meta name="viewport" content="width=device-width">
</head>
<body>
    <nav>
        
                
                @section('nav')  
                <li>Home</li>
                <li>About</li>
                @yield_section
        
    </nav>
      <div class="container">
          @yield('main')
        </div>
</body>
</html>
