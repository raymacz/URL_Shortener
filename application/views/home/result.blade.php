@layout('master')   
@section('container')
<h1> Here is the  short url! </h1>
    {{HTML::link($shortened, "url.dev/$shortened")}}
@endsection
