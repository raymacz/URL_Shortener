@layout('master')

@section('main')
    <?php// print_r($users); ?>
    @foreach($users as $user)   
        {{$user->email }}
    @endforeach
@endsection

