@layout('master')
@section('container')
        <h1>Awesome URL shortener </h1>
        {{Form::open('/') }}
       <!--     {{Form::label('url', 'Your Long URL')}}  -->
            {{Form::text('url')}}
           <!-- {{Form::submit('Shorten')}} -->
        {{Form::close('/') }}
        {{$errors->first('url','<p class="error">:message</p>')}} <!-- how to put html & :message in laravel -->
        <?php //dd($errors);?>   
        <!-- //is the same as echo $errors->first('url'); -->
@endsection