@extends ( 'layouts.shop' )

@section ( 'content' )

@php
    use App\Models\User;

    $user_linh = User::find(3);
@endphp

{{$user_linh->getAllPermissions() }}

@endsection