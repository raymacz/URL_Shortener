<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>My Website</title>
	<meta name="viewport" content="width=device-width">
</head>
<body>
    <?php //from routes that php ?>
    {{ $greeting.$thing }}
    <br/>
    @if(count($items))
        @foreach ($items as $item)
                    The item is {{$item}}
        @endforeach
     <br/>
        @forelse($items as $item)
                     The item is {{$item}}
        @empty
            There are no items
        @endforelse
   @endif  
        
    
      
</body>
</html>
